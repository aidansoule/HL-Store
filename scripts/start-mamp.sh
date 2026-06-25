#!/usr/bin/env bash
set -euo pipefail

MAMP_BIN="/Applications/MAMP/bin"

if [[ ! -d /Applications/MAMP ]]; then
  echo "Error: MAMP is not installed at /Applications/MAMP"
  exit 1
fi

# MAMP 7.x uses Nginx by default; Apache fails if the "mamp" system user is missing.
if lsof -i :8888 -sTCP:LISTEN &>/dev/null; then
  echo "Web server already running on port 8888."
else
  echo "Starting Nginx + PHP..."
  "$MAMP_BIN/startNginx.sh"
fi

# MySQL is optional for this project but start it if MAMP provides it.
if ! lsof -i :8889 -sTCP:LISTEN &>/dev/null; then
  "$MAMP_BIN/startMysql.sh" || true
fi

sleep 2

if curl -sf -o /dev/null "http://localhost:8888/hl-store/"; then
  echo "HL-Store is running at http://localhost:8888/hl-store/"
  if grep -q "hl-store.local" /etc/hosts 2>/dev/null; then
    echo "Also available at http://hl-store.local:8888/"
  fi
else
  echo "Error: MAMP web server did not respond on port 8888."
  echo "Open the MAMP app and click 'Start Servers', then try again."
  exit 1
fi
