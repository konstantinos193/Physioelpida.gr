# Contributing

This is a proprietary project built by [AdInfinity](https://adinfinity.gr) for a client. External contributions aren't expected — but if you're here, you're probably either a teammate or someone very lost.

## If you're a teammate

### Prerequisites

- Local WordPress environment (LocalWP or Laragon)
- FTP client (FileZilla) for production deploys
- WP-CLI for the fun database stuff
- The production credentials — ask, don't guess

### Workflow

1. **Never work directly on production.** We've all been tempted. Don't.
2. Set up local dev per the README instructions
3. Make your changes locally
4. Test. Actually test. Click the things.
5. Deploy via FTP to production (see Deployment section in README)

### Code style

- PHP follows WordPress coding standards (loosely)
- Child theme customizations go in `medidove-child/` — never in the parent theme
- Document anything weird with a comment. Future you will thank present you.
- Don't add new plugins without discussing first. We have 15 already. That's enough.

### What not to do

- Don't commit `wp-config.php`
- Don't commit `*.sql` files
- Don't update plugins on production without testing locally first
- Don't touch WP Reset. Don't even look at it.
- Don't edit the parent Medidove theme — changes get wiped on updates

## If you're not a teammate

We appreciate the enthusiasm. Genuinely. But this is a client site, not an open source project. The LICENSE file has the full picture.

If you spotted a bug or security issue: see [SECURITY.md](SECURITY.md).
