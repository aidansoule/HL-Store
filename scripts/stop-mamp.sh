#!/usr/bin/env bash
set -euo pipefail

MAMP_BIN="/Applications/MAMP/bin"

"$MAMP_BIN/stopNginx.sh" 2>/dev/null || true
"$MAMP_BIN/stopMysql.sh" 2>/dev/null || true
"$MAMP_BIN/stopApache.sh" 2>/dev/null || true

echo "MAMP servers stopped."
