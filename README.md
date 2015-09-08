# EDSPlacards
<h2>About</h2>
<p>Smith College's code for creating placards in EDS.  This code will display single word journal titles, finding aids, and libguides links in a three column layout.</p>

<h2>Requirements</h2>
<ul>
<li>PHP</li>
<li>Apache</li> 
<li>MySQL</li>
</ul>

<h2>Setup</h2>
<ol>
<li>Create a folder at the the root of your Apache web directory labeled eds copy the above code into it.  The htaccess file is required so make sure it is there.</li>
</ol>

<h2>Setting up - Single word journals</h2>
<p>If you do not want to use single word journal titles comment out the following sections:</p>
<ul>
  <li>Application/Controller/Display.php</li>
  <li>output - 'journals' => $this->getJournal()</li>
  </ul>
  <ol>
 <li>Create a database titled placard_subjects.</li>
<li>Use the included placard_subjects_mssql file to create a table titled journals.  <strong>This table will use Smith's proxy.  Make sure you change the proxy before you upload the file.</strong></li>
<li>Add your authorization information to Application/Controller/Pdo.php, userName/password</li>
</ol>

<h2>Setting up - Finding Aids</h2>
<p>If you do not want to use the Finding Aids comment out the following sections:</p>
<ul>
  <li>Application/Controller/Display.php</li>
  <li>output - 'faids' => $this->getFindingAids(),</li>
</ul>
<p>Finding aids do not require any additional set up.  If you want to change the link used you can on line 21 of Application/Controller/Request.php</p>

<h2>Setting up - Libguides</h2>
<strong>You must have access to Libguides API and be at least on version 1.1.  If you are not follow the information for commenting out that section below</strong>
<p>If you do not want to use libguides comment out the following sections:</p>
<ul>
  <li>Application/Controller/Display.php</li>
  <li>output - 'libguides' => $this->getLibguides()	</li>
</ul>

<ol>
<li>Add your libguides key and id to lines 18/19 in Application/Controller/Display.php.  You can obtain both from the libguides API Get Guides page.</li>
</ol>

<h2>Setting up EDS placard</h2>
<strong>You must have access to the Ebsco Admin for this section</strong>
<ol>
<li>Log in to the Ebsco Admin</li>
<li>Change to the profile to EDS</li>
<li>Click the Viewing Result tab and scroll down to modify widgets</li>
<li>Add a new widget and title it Placard (iframe) - journals</li>
<li>In the custom HTML screen add the code found in EBSCOAdmin/placard.html <strong>*Note - Make sure you change the url you are linking to.  Smith's is titled libtools.smith.edu, you will want to change it to the server your are linking to.  You will also want to remove any trackOutbound links unless you are using Google Analytics.  You can add analytics code by following the branding information below.</strong></li>
<li>Submit the custom HTML</li>
<li>Submit the widget. <strong>*Note - sometimes it can take awhile for the code to actually show up.</strong> </li>
<li>To display properly you will need to add some custom CSS.  Click on the branding tab, scroll to the bottom and click on modify bottom branding. If you do not have any bottom branding then create a new one and enter the custom css found in EBSCOAdmin/style.css.  Don't forget the style tags.  Basic and Advanced Results should be the only ones selected.</li>
<li>Save</li>
</ol>

<p>That is it.  If you find something is not working check Firebug to see if there is an issue.  As noted above it can take awhile for EDS to actually show the code changes.</p>

