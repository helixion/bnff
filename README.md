# INSTALLATION
<ol>
   <li>Download & Install the wordpress plugin <a href="http://www.advancedcustomfields.com/">Advanced Custom Fields</a>
      <ul>
         <li>Navigate to Tools » Import and select WordPress</li>
         <li>Install WP import plugin if prompted</li>
         <li>Upload and import your exported .xml file</li>
         <li>Select your user and ignore Import Attachments</li>
      </ul>
   </li>
   <li>Backup your /template-parts/content-single.php, styles.css and anything else you feel is needed.</li>
   <li>Copy over the new template-parts folder, styles.css and page_movies.php file in to the root of your bizlight theme folder (path: wp-content/themes/bizlight)</li>
</ol>

# SETUP 
1) In your wordpress admin, create a category (for example: Features) <br />
2) Create a new post (post -> add new). Input desired data in to the body, ticket link and excerpt fields, upload and select a featured image<b> (Make sure to choose your category correctly).</b> <br />
3) Create a page with the exact name of the category you want specific posts (movies) to show (if the name of the page doesn't match the category, nothing will show up), and make sure you select the template "Movie List".<br /> 
4) <b>PROFIT!</b>

<p>In hindsight, I could of just created a custom category template, but this way is fine.</p>
<p>I'll keep making adjustments to this, just make sure to make backups.</p>
