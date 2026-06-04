# Security Policy

## Supported Versions

This is a WordPress site. The version we support is whichever one is currently deployed and not actively on fire.

| Version | Supported |
|---------|-----------|
| Current production | ✅ Yes |
| Whatever was running in 2021 | ❌ God no |

## Reporting a Vulnerability

Found a security issue? Please don't post it publicly — not because we're embarrassed (we are), but because there's a real clinic and real patients on the other end of this.

**Report privately to:** hello@adinfinity.gr  
**Subject line:** `[SECURITY] physioelpida — <brief description>`

Include:
- What you found
- Steps to reproduce
- Impact (what could an attacker actually do)
- Your contact details if you want a response

### What to expect

- We'll acknowledge within **72 hours** (probably faster, we check email)
- We'll investigate and keep you updated
- If it's valid, we'll fix it before any public disclosure
- We won't threaten you, we'll thank you

### What's in scope

- The live site at [physioelpida.gr](https://physioelpida.gr)
- Any data exposure, authentication bypass, XSS, SQL injection
- Plugin vulnerabilities specific to this deployment

### What's out of scope

- WordPress core vulnerabilities — report those to [HackerOne/WordPress](https://hackerone.com/wordpress)
- Plugin vulnerabilities — report to the plugin authors
- "I found the admin login page" — yes, it's `/wp-admin`, that's intentional, that's WordPress
- InfinityFree hosting infrastructure — not our problem, not our servers
