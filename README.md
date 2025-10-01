
### Step 3: Configure Plugin Settings
1. In WordPress Admin, go to **Settings → IndexNow**.  
2. Paste your key into the field.  
3. Select which post types should trigger IndexNow submission (posts, pages, products, etc.).  
4. Enable homepage and blog index submission if desired.  
5. Save changes.  

---

## Manual Submission

From **Settings → IndexNow**, scroll down to **Manual Submission** and click Submit Now.  
This will immediately ping:  

- Homepage  
- Sitemap  
- Blog index (if enabled)  

---

## WP-CLI Usage

If you have WP-CLI installed, you can submit URLs manually from your server shell:

```bash
wp indexnow submit
This command will send:

Homepage

Sitemap

Blog index (if enabled)

This is useful for automation, scheduled cron jobs, or bulk resubmissions.

Example Workflow

You publish a new blog post.

The plugin automatically submits:

Post URL

Sitemap URL

Blog index (if enabled)

Homepage (if enabled)

Search engines crawl the changes much faster than waiting for natural discovery.

Privacy and Performance

No tracking and no bloat.

Requests are lightweight JSON payloads sent directly to search engine IndexNow APIs.

The plugin does not store or share your data beyond the configured endpoints.

Troubleshooting

My key is invalid
Make sure the .txt file in your site root matches the key you entered in the plugin settings.

Sitemap not detected
The plugin checks for sitemap_index.xml or sitemap.xml in your site root. If your SEO plugin generates a custom sitemap URL, update the plugin to reflect the correct path.

WP-CLI command not found
Ensure WP-CLI is installed and available on your server. Run wp --info to check.

License

MIT License. Free to use, modify, and share.

Author

Developed by Matt Adlard
2025
