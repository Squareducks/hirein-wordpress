# HireIn WordPress Project

WordPress website for HireIn equipment rental business (hirein.co.uk)

## Overview

This repository contains the custom themes, plugins, and configuration files for the HireIn WordPress website. The site specializes in equipment hire including scaffold towers, ladders, powered access equipment, and site accessories.

## Repository Structure

```
hirein-wordpress/
├── wp-content/
│   ├── themes/
│   │   └── [custom-themes]/     # Custom theme files
│   └── plugins/
│       └── [custom-plugins]/    # Custom plugin files
├── composer.json                # Dependency management
├── wp-config-sample.php        # WordPress configuration template
├── .gitignore                   # Git ignore rules
└── README.md                    # This file
```

## Setup Instructions

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Composer
- Node.js (for build tools)
- Git

### Local Development Setup

1. **Clone the repository:**
   ```bash
   git clone https://github.com/Squareducks/hirein-wordpress.git
   cd hirein-wordpress
   ```

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Configure WordPress:**
   ```bash
   cp wp-config-sample.php wp-config.php
   # Edit wp-config.php with your database credentials
   ```

4. **Set up database:**
   - Create a MySQL database
   - Import the latest database backup (not included in repository)
   - Update wp-config.php with database details

5. **Configure web server:**
   - Point document root to the project directory
   - Ensure proper URL rewriting is enabled

### Deployment

This repository follows the "Database Moves Down, Code Moves Up" principle:

- **Code changes:** Develop locally, commit to repository, deploy to production
- **Content changes:** Made on production, database synced down to development

### Development Workflow

1. Create feature branches from `develop`
2. Make changes to custom themes/plugins only
3. Test locally with production database copy
4. Submit pull request for code review
5. Merge to `develop` after approval
6. Deploy to staging for testing
7. Merge to `main` and deploy to production

## What's Included

- Custom WordPress themes
- Custom plugins and functionality
- Composer configuration for dependency management
- Git ignore rules following WordPress best practices
- Configuration templates

## What's NOT Included

- WordPress core files (managed via Composer)
- Third-party plugins (managed via Composer)
- Database content
- Media uploads
- Configuration files with sensitive data
- Cache and log files

## Contributing

1. Follow WordPress coding standards
2. Test all changes locally before committing
3. Write clear commit messages
4. Update documentation as needed

## Support

For technical support or questions about this repository, contact the development team at Squareducks.

## License

Proprietary - All rights reserved by Squareducks and HireIn.
