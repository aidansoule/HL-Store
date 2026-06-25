#!/usr/bin/env bash
set -euo pipefail

PROJECT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
HTDOCS_LINK="/Applications/MAMP/htdocs/hl-store"
NGINX_CONF="/Applications/MAMP/conf/nginx/nginx.conf"
HTTPD_CONF="/Applications/MAMP/conf/apache/httpd.conf"
VHOST_FILE="/Applications/MAMP/conf/apache/extra/httpd-vhosts.conf"
HOSTS_ENTRY="127.0.0.1 hl-store.local"
NGINX_MARKER="# HL-Store local development"
VHOST_MARKER="# HL-Store local development"
CURRENT_USER="$(whoami)"

if [[ ! -d /Applications/MAMP ]]; then
  echo "Error: MAMP is not installed at /Applications/MAMP"
  echo "Download it from https://www.mamp.info/"
  exit 1
fi

echo "==> Linking project into MAMP htdocs..."
ln -sfn "$PROJECT_DIR" "$HTDOCS_LINK"

echo "==> Configuring Nginx for hl-store.local..."
if ! grep -q "$NGINX_MARKER" "$NGINX_CONF" 2>/dev/null; then
  sed '$d' "$NGINX_CONF" > "${NGINX_CONF}.tmp"
  cat >> "${NGINX_CONF}.tmp" <<EOF

    $NGINX_MARKER
    server {
        listen               8888;
        server_name          hl-store.local;
        root                 "$PROJECT_DIR";
        index                index.php index.html;

        location ~ \.php\$ {
            try_files        \$uri =404;
            fastcgi_pass     unix:/Applications/MAMP/Library/logs/fastcgi/nginxFastCGI.sock;
            fastcgi_param    SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
            include          fastcgi_params;
        }

        location ~ /\. {
            deny all;
        }
    }
}
EOF
  mv "${NGINX_CONF}.tmp" "$NGINX_CONF"
fi

echo "==> Configuring Apache virtual host (optional fallback)..."
if ! grep -q "$VHOST_MARKER" "$VHOST_FILE" 2>/dev/null; then
  cat >> "$VHOST_FILE" <<EOF

$VHOST_MARKER
<VirtualHost *:8888>
    ServerName hl-store.local
    DocumentRoot "$PROJECT_DIR"
    <Directory "$PROJECT_DIR">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
EOF
fi

if grep -q '#Include /Applications/MAMP/conf/apache/extra/httpd-vhosts.conf' "$HTTPD_CONF"; then
  sed -i '' 's|#Include /Applications/MAMP/conf/apache/extra/httpd-vhosts.conf|Include /Applications/MAMP/conf/apache/extra/httpd-vhosts.conf|' "$HTTPD_CONF"
fi

# MAMP expects a "mamp" system user that may not exist on fresh installs.
if grep -q '^User mamp$' "$HTTPD_CONF" 2>/dev/null && ! id mamp &>/dev/null; then
  echo "==> Fixing Apache user (mamp account missing, using $CURRENT_USER)..."
  sed -i '' "s/^User mamp$/User $CURRENT_USER/" "$HTTPD_CONF"
fi

echo "==> Adding hl-store.local to /etc/hosts..."
if grep -q "hl-store.local" /etc/hosts; then
  echo "    Already present."
elif echo "$HOSTS_ENTRY" | sudo tee -a /etc/hosts > /dev/null 2>&1; then
  echo "    Added."
else
  echo "    Skipped (needs admin password). Run manually:"
  echo "    echo \"$HOSTS_ENTRY\" | sudo tee -a /etc/hosts"
fi

echo "==> Starting MAMP servers..."
"$SCRIPT_DIR/start-mamp.sh"

echo ""
echo "Setup complete. Open:"
echo "  http://localhost:8888/hl-store/"
if grep -q "hl-store.local" /etc/hosts; then
  echo "  http://hl-store.local:8888/"
fi
echo ""
echo "To start servers later: ./scripts/start-mamp.sh"
