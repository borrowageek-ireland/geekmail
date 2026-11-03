# GeekMail

**GeekMail v1.0.0** is a lightweight WordPress administrator dashboard for email management and Cluster A mail-client setup. Developed by [Borrow A Geek](https://www.borrowageek.com).

## Features

- **Email Management Console** — https://admin.a.hostedemail.com/
- **Access Webmail** — https://webmail.geekmail.ie
- **Get Support** — https://support.borrowageek.ie
- Step-by-step configuration help for Outlook, Apple Mail, iPhone/iPad, Android and Thunderbird
- Troubleshooting information and Cluster A IMAP, SMTP and optional POP3 settings
- GeekMail admin menu with a mail icon

## Install

1. Download the ZIP from the repository's `releases/` folder (or from the latest [release](https://github.com/borrowageek-ireland/geekmail/releases) if available).
2. In WordPress, open **Plugins → Add New Plugin → Upload Plugin**.
3. Choose `geekmail-v1.0.0.zip` (or `geekmail.zip`), select **Install Now**, then **Activate Plugin**.
4. Open **GeekMail** from the WordPress administration menu.

Do not upload the whole GitHub repository archive: WordPress expects the plugin-only ZIP with a top-level `geekmail/` folder.

## Cluster A server configuration

| Setting | Value |
| --- | --- |
| Incoming (IMAP) | `mail.hostedemail.com` |
| IMAP port | `993` / SSL/TLS |
| Outgoing (SMTP) | `mail.hostedemail.com` |
| SMTP port | `465` / SSL/TLS |
| Alternative SMTP | `587` / STARTTLS |
| Optional POP3 | `mail.hostedemail.com`, port `995` / SSL/TLS |
| Username | Full email address |
| Authentication | Mailbox password; SMTP authentication enabled |

IMAP is recommended for accounts used on multiple devices.

## Requirements

- WordPress 5.8 or newer
- PHP 7.4 or newer

## Security and scope

GeekMail is an information and navigation plugin. It does not collect/store mailbox credentials, manage mailboxes via an API, or change WordPress email delivery. The external links open in a new browser tab.

## Source and distribution

The WordPress plugin lives in [`geekmail/`](geekmail/) and the installable ZIP is distributed under [`releases/`](releases/).

## License

GPL-2.0-or-later.

© Borrow A Geek — https://www.borrowageek.com
