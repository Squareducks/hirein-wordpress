#!/bin/bash

# HireIn WordPress Deployment Script
# This script deploys code changes to the production server

set -e

# Configuration
REMOTE_HOST="hirein.co.uk"
REMOTE_USER="your-username"
REMOTE_PATH="/path/to/wordpress"
LOCAL_PATH="."

# Colors for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo -e "${GREEN}Starting HireIn WordPress Deployment${NC}"

# Check if we're in the right directory
if [ ! -f "composer.json" ]; then
    echo -e "${RED}Error: composer.json not found. Are you in the right directory?${NC}"
    exit 1
fi

# Install/update dependencies
echo -e "${YELLOW}Installing Composer dependencies...${NC}"
composer install --no-dev --optimize-autoloader

# Build assets
echo -e "${YELLOW}Building assets...${NC}"
npm ci
npm run build

# Sync files to remote server (excluding sensitive files)
echo -e "${YELLOW}Syncing files to production server...${NC}"
rsync -avz --delete \
    --exclude='.git/' \
    --exclude='node_modules/' \
    --exclude='.env*' \
    --exclude='wp-config.php' \
    --exclude='wp-content/uploads/' \
    --exclude='wp-content/cache/' \
    --exclude='*.log' \
    ${LOCAL_PATH}/ ${REMOTE_USER}@${REMOTE_HOST}:${REMOTE_PATH}/

# Clear cache on remote server
echo -e "${YELLOW}Clearing cache on production server...${NC}"
ssh ${REMOTE_USER}@${REMOTE_HOST} "cd ${REMOTE_PATH} && wp cache flush"

echo -e "${GREEN}Deployment completed successfully!${NC}"
echo -e "${YELLOW}Don't forget to:${NC}"
echo "1. Test the website functionality"
echo "2. Check for any errors in the logs"
echo "3. Verify that all plugins are working correctly"
