# Git Dual Remote Management Guide

This project uses two Git remotes to manage collaboration and deployment separately.

## Remote Configuration

- **`origin`**: Original repository (collaboration)
  - URL: `git@github.com:Amrilazim3/amrilazim-portfolio.git`
  - Purpose: Sync with the original project owner

- **`my-account`**: Your personal repository (deployment)
  - URL: `git@github.com:vortechron/amrilazim_com.git`
  - Purpose: Your deployment repository with your own GitHub Actions secrets

## Viewing Remotes

To see all configured remotes:

```bash
git remote -v
```

## Common Workflows

### 1. Fetching from Both Remotes

Fetch updates from both remotes:

```bash
# Fetch from origin (original repo)
git fetch origin

# Fetch from your account
git fetch my-account

# Or fetch from both at once
git fetch --all
```

### 2. Pushing to Your Deployment Repository

When you want to push to your account for deployment:

```bash
# Push current branch to your account
git push my-account <branch-name>

# Example: Push main branch
git push my-account main

# Push and set upstream (for first time)
git push -u my-account <branch-name>
```

### 3. Pushing to Original Repository

When you want to sync with the original repository:

```bash
# Push current branch to origin
git push origin <branch-name>

# Example: Push main branch
git push origin main
```

### 4. Pushing to Both Remotes

To push the same branch to both remotes:

```bash
# Push to origin first
git push origin <branch-name>

# Then push to your account
git push my-account <branch-name>

# Or use a single command (if you have multiple push URLs configured)
git push origin <branch-name> && git push my-account <branch-name>
```

### 5. Pulling from Original Repository

To get updates from the original repository:

```bash
# Pull from origin
git pull origin <branch-name>

# Or checkout and track a branch from origin
git checkout -b <local-branch> origin/<branch-name>
```

### 6. Setting Up Tracking Branches

Set up tracking for easier push/pull:

```bash
# Track origin's main branch
git branch --set-upstream-to=origin/main main

# Track your account's main branch (for deployment)
git branch --set-upstream-to=my-account/main main
```

Note: You can only track one remote per branch. For deployment, you'll typically want to track `my-account`.

## Recommended Workflow

### Daily Development

1. **Pull latest changes from origin**:
   ```bash
   git pull origin main
   ```

2. **Make your changes and commit**:
   ```bash
   git add .
   git commit -m "Your commit message"
   ```

3. **Push to your deployment repo** (for CI/CD):
   ```bash
   git push my-account main
   ```

4. **Optionally sync with origin** (if you want to share changes):
   ```bash
   git push origin main
   ```

### Initial Setup for Deployment

If this is the first time pushing to your account:

```bash
# Make sure you're on the branch you want to deploy
git checkout main

# Push to your account and set upstream
git push -u my-account main
```

## Managing Remotes

### Change Remote URL

If you need to update a remote URL:

```bash
# Update origin URL
git remote set-url origin <new-url>

# Update my-account URL
git remote set-url my-account <new-url>
```

### Remove a Remote

If you need to remove a remote (use with caution):

```bash
git remote remove <remote-name>
```

### Add Additional Remote

If you need to add another remote:

```bash
git remote add <remote-name> <remote-url>
```

## Branch Management

### List Remote Branches

```bash
# List branches from origin
git branch -r origin

# List branches from your account
git branch -r my-account

# List all remote branches
git branch -r
```

### Checkout Remote Branch

```bash
# Checkout a branch from origin
git checkout -b <local-branch> origin/<branch-name>

# Checkout a branch from your account
git checkout -b <local-branch> my-account/<branch-name>
```

## GitHub Actions Configuration

Your GitHub Actions workflow (`.github/workflows/deploy-production.yml`) should be configured to:
- Use secrets from your `my-account` repository
- Trigger on pushes to `my-account` remote
- Not interfere with the original repository's workflows

Make sure your workflow file references the correct remote if needed.

## Troubleshooting

### Authentication Issues

If you encounter authentication issues:

1. **Check SSH keys**: Ensure your SSH key is added to your GitHub account
   ```bash
   ssh -T git@github.com
   ```

2. **Use HTTPS instead**: If SSH doesn't work, you can switch to HTTPS
   ```bash
   git remote set-url my-account https://github.com/vortechron/amrilazim_com.git
   ```

### Push Rejected

If push is rejected due to diverged histories:

```bash
# Pull and rebase first
git pull my-account <branch-name> --rebase

# Then push
git push my-account <branch-name>
```

### Wrong Remote

If you accidentally pushed to the wrong remote:

```bash
# Check where you pushed
git remote show origin
git remote show my-account

# If needed, push to the correct remote
git push <correct-remote> <branch-name>
```

## Quick Reference

| Task | Command |
|------|---------|
| View remotes | `git remote -v` |
| Fetch from origin | `git fetch origin` |
| Fetch from my-account | `git fetch my-account` |
| Push to origin | `git push origin <branch>` |
| Push to my-account | `git push my-account <branch>` |
| Pull from origin | `git pull origin <branch>` |
| Pull from my-account | `git pull my-account <branch>` |
| Set upstream to my-account | `git push -u my-account <branch>` |

## Notes

- Always be careful when pushing to `origin` as it affects the original repository
- Use `my-account` for your deployment workflows
- Keep your deployment secrets in your `my-account` repository, not in `origin`
- Consider using branch protection rules in your `my-account` repository for production branches

