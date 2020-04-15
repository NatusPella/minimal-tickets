# Minimal Tickets
Minimal ticket system written in PHP. In development, not ready for production.

## Userflow
1. A ``User`` logs in using their e-mail address
2. They recieve a link with a one-time-password in their inbox
3. They click the link to login
4. The user can now create, view and respond to tickets

## Setup
- You can change the tags that are allowed in the platform using the ``Core::$defaultTags`` setting.
