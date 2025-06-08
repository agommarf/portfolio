@extends('layouts.app')

@section('title', 'Cookie Policy')

@section('content')
  <section class="video-detail">
    <h2>Cookie Policy</h2>
    <p><em>Last updated: June 2025</em></p>

    <h3>1. What Are Cookies?</h3>
    <p>Cookies are small text files placed on your device when you visit a website. They help the site remember your actions and preferences (such as login, language, font size) over a period of time, so you don’t have to re-enter them each time you return.</p>

    <h3>2. How I Use Cookies</h3>
    <p>I use cookies for the following purposes:</p>
    <ul>
      <li><strong>Essential Cookies:</strong> Required for basic site functionality (e.g., enabling video playback, navigation).</li>
      <li><strong>Performance & Analytics Cookies:</strong> Help me understand how visitors use my site (e.g., Google Analytics). These cookies do not collect personal information.</li>
      <li><strong>Functionality Cookies:</strong> Remember user preferences (e.g., theme, language).</li>
      <li><strong>Advertising & Targeting Cookies:</strong> Third-party cookies (e.g., Vimeo embeds, social widgets) to deliver personalized content and measure ad effectiveness. I do not control these cookies.</li>
    </ul>

    <h3>3. Types of Cookies I Set</h3>
    <table border="1px solid black">
      <thead>
        <tr>
          <th>Cookie Category</th>
          <th>Purpose</th>
          <th>Expires</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Session Cookies</td>
          <td>Maintain your session until you close the browser.</td>
          <td>End of session</td>
        </tr>
        <tr>
          <td>Persistent Cookies</td>
          <td>Remember preferences across multiple visits.</td>
          <td>30 days / 1 year (varies)</td>
        </tr>
        <tr>
          <td>Third-Party Cookies</td>
          <td>Set by external services (e.g., Vimeo).</td>
          <td>Varies by provider</td>
        </tr>
      </tbody>
    </table>

    <h3>4. Managing Cookies</h3>
    <p>Most browsers automatically accept cookies, but you can adjust your browser settings to refuse them or notify you when a cookie is set. For instructions, visit:</p>
    <ul>
      <li>Chrome: Settings → Privacy and security → Cookies and other site data</li>
      <li>Firefox: Preferences → Privacy & Security → Cookies and Site Data</li>
      <li>Safari: Preferences → Privacy → Cookies and website data</li>
    </ul>
    <p>Disabling certain cookies may affect your experience on my site.</p>

    <h3>5. Third-Party Cookie Disclosure</h3>
    <p>I use Vimeo embeds to display videos. Vimeo may set cookies for analytics and playback functionality. For details on Vimeo’s cookie usage, refer to Vimeo’s Privacy Policy.</p>

    <h3>6. Changes to This Cookie Policy</h3>
    <p>I may update this Cookie Policy at any time by posting a revised version on this page. The “Last updated” date will reflect when changes were made.</p>

    <h3>7. Contact Me</h3>
    <p>If you have questions about my use of cookies, please contact me</p>
  </section>
@endsection
