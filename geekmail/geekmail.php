<?php
/**
 * Plugin Name: GeekMail
 * Plugin URI: https://www.borrowageek.com
 * Description: Email management links and Cluster A mail client setup instructions.
 * Version: 1.0.0
 * Author: Borrow A Geek
 * Author URI: https://www.borrowageek.com
 * License: GPL-2.0-or-later
 * Text Domain: geekmail
 */
if (!defined('ABSPATH')) { exit; }

add_action('admin_menu', function () {
    add_menu_page('GeekMail', 'GeekMail', 'read', 'geekmail', 'geekmail_render_page', 'dashicons-email-alt', 58);
});

function geekmail_render_page() {
    if (!current_user_can('read')) { return; }
    $links = array(
        array('Email Management Console', 'https://admin.a.hostedemail.com/'),
        array('Access Webmail', 'https://webmail.geekmail.ie'),
        array('Get Support', 'https://support.borrowageek.ie'),
    );
    ?>
    <div class="wrap geekmail-wrap">
      <h1><span class="dashicons dashicons-email-alt" aria-hidden="true"></span> GeekMail</h1>
      <p class="description">Manage your email and find instructions for setting up your devices.</p>
      <div class="geekmail-actions">
        <?php foreach ($links as $link) : ?>
          <a class="button button-primary button-hero" href="<?php echo esc_url($link[1]); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html($link[0]); ?> <span class="dashicons dashicons-external" aria-hidden="true"></span></a>
        <?php endforeach; ?>
      </div>
      <div class="geekmail-panel">
        <h2>Mail client settings — GeekMail (Cluster A)</h2>
        <p>For most customers, <strong>IMAP is recommended</strong> because it keeps email and folders synchronised across your devices. You will need your full email address and mailbox password.</p>
        <table class="widefat striped geekmail-table"><tbody>
          <tr><th scope="row">Account type</th><td>IMAP (recommended)</td></tr>
          <tr><th scope="row">Incoming server (IMAP)</th><td><code>mail.hostedemail.com</code></td></tr>
          <tr><th scope="row">Incoming port / security</th><td><strong>993</strong> / SSL/TLS</td></tr>
          <tr><th scope="row">Outgoing server (SMTP)</th><td><code>mail.hostedemail.com</code></td></tr>
          <tr><th scope="row">Outgoing port / security</th><td><strong>465</strong> / SSL/TLS (alternative: 587 / STARTTLS)</td></tr>
          <tr><th scope="row">SMTP authentication</th><td>Required; use the same full email address and mailbox password</td></tr>
          <tr><th scope="row">Username</th><td>Your full email address (e.g. name@example.com)</td></tr>
          <tr><th scope="row">Password</th><td>Your mailbox password</td></tr>
          <tr><th scope="row">Optional POP3</th><td><code>mail.hostedemail.com</code> / port <strong>995</strong> / SSL/TLS (not recommended for multiple devices)</td></tr>
        </tbody></table>
        <p class="description">Use these settings when automatic account detection fails or when your mail app asks for manual configuration.</p>
      </div>
      <div class="geekmail-panel">
        <h2>Step-by-step setup instructions</h2>
        <p>Choose the instructions for your email app. Menu names may vary slightly by app version.</p>
        <details open><summary>Microsoft Outlook (Windows or Mac)</summary><ol>
          <li>Open Outlook. Go to <strong>File &gt; Add Account</strong> on classic Outlook for Windows, or <strong>Outlook &gt; Settings &gt; Accounts &gt; Add Account</strong> on Mac.</li>
          <li>Enter your full email address. If prompted, choose <strong>IMAP</strong> or <strong>Advanced setup / manual configuration</strong>.</li>
          <li>Enter incoming server <code>mail.hostedemail.com</code>, IMAP port <strong>993</strong>, encryption <strong>SSL/TLS</strong>.</li>
          <li>Enter outgoing server <code>mail.hostedemail.com</code>, SMTP port <strong>465</strong>, encryption <strong>SSL/TLS</strong>. If unavailable, try <strong>587</strong> with <strong>STARTTLS</strong>.</li>
          <li>Use your <strong>full email address</strong> as the username for both incoming and outgoing servers. Enter your mailbox password and enable outgoing-server authentication.</li>
          <li>Save the account, then send a test email and check that it arrives. Some Outlook versions do not support manual IMAP setup in the same way; use classic Outlook or contact support if the options are missing.</li>
        </ol></details>
        <details><summary>Apple Mail (Mac)</summary><ol>
          <li>Open <strong>Mail &gt; Add Account</strong> (or <strong>Mail &gt; Settings &gt; Accounts &gt; Add Account</strong>).</li>
          <li>Choose <strong>Other Mail Account</strong>, enter your name, full email address and mailbox password.</li>
          <li>If asked for account type, choose <strong>IMAP</strong>. Enter <code>mail.hostedemail.com</code> for both incoming and outgoing mail servers and your full email address as username.</li>
          <li>Finish adding the account. If connection fails, open <strong>Mail &gt; Settings &gt; Accounts &gt; Server Settings</strong> and turn off automatic settings.</li>
          <li>Set incoming IMAP to <strong>993 / TLS/SSL</strong> and outgoing SMTP to <strong>465 / TLS/SSL</strong>, with authentication and your full email address/password.</li>
          <li>Send and receive a test message.</li>
        </ol></details>
        <details><summary>iPhone or iPad (Apple Mail)</summary><ol>
          <li>Open <strong>Settings &gt; Apps &gt; Mail &gt; Mail Accounts &gt; Add Account</strong> (on older iOS versions: <strong>Settings &gt; Mail &gt; Accounts</strong>).</li>
          <li>Choose <strong>Other &gt; Add Mail Account</strong> and enter your name, full email address, password and description.</li>
          <li>Select <strong>IMAP</strong>. Under <strong>Incoming Mail Server</strong>, set Host Name to <code>mail.hostedemail.com</code>, Username to your full email address and Password to your mailbox password.</li>
          <li>Under <strong>Outgoing Mail Server</strong>, enter the same hostname, full email address and password, even if the username and password appear optional.</li>
          <li>Tap <strong>Next</strong>, save the account and test sending. If needed, edit <strong>Advanced</strong> settings to use IMAP <strong>993 with SSL</strong> and SMTP <strong>465 with SSL</strong>.</li>
        </ol></details>
        <details><summary>Android (Gmail app or another mail app)</summary><ol>
          <li>Open the Gmail app, tap your profile icon, then <strong>Add another account &gt; Other</strong> (or choose <strong>Add account</strong> in your preferred mail app).</li>
          <li>Enter your full email address and select <strong>Personal (IMAP)</strong> or manual IMAP setup.</li>
          <li>Enter your mailbox password. Set incoming server to <code>mail.hostedemail.com</code>, port <strong>993</strong>, security <strong>SSL/TLS</strong> and username to your full email address.</li>
          <li>Set outgoing SMTP server to <code>mail.hostedemail.com</code>, port <strong>465</strong>, security <strong>SSL/TLS</strong>. Enable sign-in and enter the same full email address and password.</li>
          <li>Finish setup and send a test message. If port 465 is unavailable, try <strong>587 with STARTTLS</strong>.</li>
        </ol></details>
        <details><summary>Mozilla Thunderbird (Windows, Mac or Linux)</summary><ol>
          <li>Open Thunderbird and choose <strong>New Account &gt; Existing Email</strong> (or <strong>Account Settings &gt; Account Actions &gt; Add Mail Account</strong>).</li>
          <li>Enter your name, full email address and mailbox password, then select <strong>Configure manually</strong> if needed.</li>
          <li>Incoming: <strong>IMAP</strong>, <code>mail.hostedemail.com</code>, port <strong>993</strong>, <strong>SSL/TLS</strong>, authentication <strong>Normal password</strong>.</li>
          <li>Outgoing: <strong>SMTP</strong>, <code>mail.hostedemail.com</code>, port <strong>465</strong>, <strong>SSL/TLS</strong>, authentication <strong>Normal password</strong>.</li>
          <li>Set both usernames to your full email address. Click <strong>Re-test</strong>, then <strong>Done</strong>.</li>
          <li>Send a test email and verify that messages synchronise.</li>
        </ol></details>
        <details><summary>Troubleshooting</summary><ul>
          <li><strong>Cannot sign in:</strong> Check your full email address and password by signing in through <a href="https://webmail.geekmail.ie" target="_blank" rel="noopener noreferrer">GeekMail Webmail</a>.</li>
          <li><strong>Can receive but cannot send:</strong> Ensure SMTP authentication is enabled and uses your full email address/password. Try SMTP port <strong>587 / STARTTLS</strong> instead of 465 / SSL/TLS.</li>
          <li><strong>Cannot connect:</strong> Verify the hostname is exactly <code>mail.hostedemail.com</code>, check the encryption and port, and confirm your device has an internet connection.</li>
          <li><strong>Messages differ between devices:</strong> Use IMAP rather than POP3.</li>
          <li><strong>Still stuck?</strong> Use the <strong>Get Support</strong> button above. Never send your password in a support ticket.</li>
        </ul></details>
      </div>
      <p class="description">GeekMail by <a href="https://www.borrowageek.com" target="_blank" rel="noopener noreferrer">Borrow A Geek</a>.</p>
    </div>
    <style>
      .geekmail-wrap{max-width:1050px}.geekmail-wrap h1>.dashicons{font-size:30px;width:35px;height:35px;color:#2271b1}.geekmail-actions{display:flex;gap:12px;flex-wrap:wrap;margin:24px 0}.geekmail-actions .button{display:inline-flex;align-items:center;gap:8px;white-space:normal;text-align:center}.geekmail-actions .dashicons{font-size:16px;width:16px;height:16px}.geekmail-panel{background:#fff;border:1px solid #dcdcde;border-radius:8px;padding:20px 24px;margin:20px 0;box-shadow:0 1px 2px rgba(0,0,0,.04)}.geekmail-panel h2{margin-top:0}.geekmail-table th{width:240px}.geekmail-panel details{border-top:1px solid #dcdcde;padding:14px 0}.geekmail-panel details:last-child{border-bottom:1px solid #dcdcde}.geekmail-panel summary{font-weight:600;font-size:14px;cursor:pointer;color:#135e96}.geekmail-panel li{margin:10px 0;line-height:1.6}.geekmail-panel ol,.geekmail-panel ul{padding-left:24px}.geekmail-panel code{word-break:break-word}@media(max-width:600px){.geekmail-actions{flex-direction:column}.geekmail-actions .button{justify-content:center}.geekmail-table th{width:42%}.geekmail-panel{padding:16px}}
    </style>
    <?php
}
