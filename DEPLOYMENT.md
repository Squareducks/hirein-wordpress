## Pillar Page Deployment Instructions

This guide provides step-by-step instructions for deploying the new internal linking optimization pillar pages to the live HireIn WordPress site.

### Prerequisites

1.  **Administrator access** to the HireIn WordPress dashboard.
2.  **FTP/SFTP access** to the live server (or use of a file manager plugin).
3.  **A full backup** of the live site (files and database) should be taken before proceeding.

### Step 1: Deploy Theme Files

The new pillar page functionality is contained within the `Lakeside` theme. You will need to upload the updated theme files to the live server.

1.  **Connect to your server** via FTP/SFTP or navigate to the file manager in your hosting control panel.
2.  **Navigate to the theme directory**: `wp-content/themes/lakeside/`
3.  **Upload the following new and modified files** from the GitHub repository to this directory:

    *   `page-scaffold-access-solutions.php`
    *   `page-site-groundworks-equipment.php`
    *   `page-safety-security-equipment.php`
    *   `page-material-handling-lifting.php`
    *   `page-diy-home-renovation.php`
    *   `pillar-navigation-widget.php`
    *   `pillar-breadcrumbs.php`
    *   `functions.php` (overwrite existing file)
    *   `css/pillar-pages.css` (upload to the `css` subdirectory)

### Step 2: Create Pillar Pages in WordPress

Now that the templates are on the server, you need to create the pages in WordPress and assign the new templates.

1.  **Log in** to the HireIn WordPress dashboard.
2.  Navigate to **Pages > Add New**.
3.  Create a new page for each of the 5 pillar topics:

| Page Title | Page Slug (URL) | Template to Select |
| :--- | :--- | :--- |
| The Ultimate Guide to Scaffold & Access Solutions | `scaffold-access-solutions` | `Scaffold & Access Solutions Pillar Page` |
| The Ultimate Guide to Site & Groundworks Equipment | `site-groundworks-equipment` | `Site & Groundworks Equipment Pillar Page` |
| The Ultimate Guide to Safety & Security Equipment | `safety-security-equipment` | `Safety & Security Equipment Pillar Page` |
| The Ultimate Guide to Material Handling & Lifting | `material-handling-lifting` | `Material Handling & Lifting Pillar Page` |
| The Ultimate Guide to DIY & Home Renovation Projects | `diy-home-renovation` | `DIY & Home Renovation Projects Pillar Page` |

4.  For each page:
    *   Enter the **Page Title**.
    *   In the **Page Attributes** meta box on the right, select the corresponding template from the **Template** dropdown.
    *   Click **Publish**.

### Step 3: Configure Pillar Page Navigation

The new pillar page functionality includes a navigation widget. You need to add this to the appropriate sidebar.

1.  In the WordPress dashboard, navigate to **Appearance > Widgets**.
2.  You will see a new widget available called **Pillar Pages Navigation**.
3.  Drag this widget into the **Pillar Page Sidebar** widget area.
4.  Give it a title, such as "Our Equipment Guides", and click **Save**.

### Step 4: Verify Implementation

1.  **Visit the newly created pages** on the live site (e.g., `https://hirein.co.uk/scaffold-access-solutions/`).
2.  **Verify that the content is displaying correctly** and that the styling matches the design.
3.  **Check that the breadcrumb navigation** is present and correct.
4.  **Confirm that the Pillar Pages Navigation widget** is appearing in the sidebar.

### Deployment Complete

Once you have completed these steps, the Week 1 implementation will be live on the HireIn website. The site is now ready for the Week 2 implementation of contextual internal linking.
