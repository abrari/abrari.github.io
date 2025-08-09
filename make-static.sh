#!/bin/bash

# Define the server host and port
HOST="0.0.0.0"
PORT="8083"
URL="http://localhost:${PORT}"
DOCROOT="src"

# Start the PHP development server in the background
cd "$DOCROOT"
php -S "${HOST}:${PORT}" > /dev/null 2>&1 &
SERVER_PID=$! # Store the process ID of the server

# Wait for the server to be ready
echo "Waiting for PHP server to start..."
while ! curl -s "${URL}" > /dev/null; do
    sleep 1
done
echo "Server is ready."

# Navigate back to the root directory
cd ..

# Delete existing directories
echo "Cleanup existing files..."
rm -rf css
rm -rf fonts
rm -rf images
rm -rf js
rm -rf product.php
rm -rf product
rm favicon.png
rm index.html

# Use wget to crawl the site and save it statically
echo "Crawling the site..."
wget -nH -E -m -p -k "${URL}"

# Fix file extensions and links
echo "Fixing file extensions and links..."
find ./ -type f -not -path "./.git/*" -not -name "make-static.sh" -exec sed -i -e 's/product.php/product/g' {} \;
mv product.php product

# Kill the PHP server process
echo "Stopping the PHP server..."
kill "${SERVER_PID}"

echo "Static site generation complete."