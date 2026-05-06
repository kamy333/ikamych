<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Git Branching, Local vs Remote, and Merge Guide</title>
  <style>
    :root {
      --bg: #f4f7fb;
      --panel: #ffffff;
      --panel-soft: #f8fbff;
      --text: #172033;
      --muted: #5a6478;
      --border: #d7dfec;
      --accent: #2457c5;
      --accent-soft: #e9f0ff;
      --ok: #146c43;
      --ok-bg: #eaf7f0;
      --warn: #8a5a00;
      --warn-bg: #fff4d8;
      --code-bg: #0f172a;
      --code-text: #e5e7eb;
      --shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
      --sidebar-width: 280px;
    }

    * {
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      margin: 0;
      background: var(--bg);
      color: var(--text);
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
      line-height: 1.6;
    }

    a {
      color: var(--accent);
    }

    header {
      background: linear-gradient(135deg, #1e3f8f, #0f766e);
      color: #ffffff;
      padding: 24px 24px 28px;
    }

    .header-wrap,
    .page-wrap {
      width: min(1400px, calc(100% - 32px));
      margin: 0 auto;
    }

    h1 {
      margin: 0 0 8px;
      font-size: clamp(1.6rem, 2.5vw, 2.2rem);
      line-height: 1.15;
    }

    h2 {
      margin: 0 0 14px;
      font-size: 1.4rem;
      color: #102a63;
    }

    h3 {
      margin: 18px 0 8px;
      font-size: 1.02rem;
      color: #14356f;
    }

    p {
      margin: 0 0 14px;
    }

    .lead {
      max-width: 900px;
      margin: 0;
      opacity: 0.96;
    }

    .page-wrap {
      display: grid;
      grid-template-columns: var(--sidebar-width) minmax(0, 1fr);
      gap: 24px;
      align-items: start;
      padding: 24px 0 56px;
    }

    .sidebar {
      position: sticky;
      top: 18px;
      align-self: start;
      background: var(--panel);
      border: 1px solid var(--border);
      border-radius: 8px;
      box-shadow: var(--shadow);
      padding: 18px;
      max-height: calc(100vh - 36px);
      overflow: auto;
    }

    .sidebar h2 {
      font-size: 1rem;
      margin-bottom: 12px;
    }

    .sidebar ol {
      margin: 0;
      padding-left: 18px;
    }

    .sidebar li + li {
      margin-top: 8px;
    }

    .sidebar a {
      color: var(--text);
      text-decoration: none;
    }

    .sidebar a:hover,
    .sidebar a:focus-visible {
      color: var(--accent);
    }

    .sidebar .mini-note {
      margin-top: 16px;
      padding-top: 14px;
      border-top: 1px solid var(--border);
      color: var(--muted);
      font-size: 0.92rem;
    }

    .content {
      min-width: 0;
    }

    section,
    .card {
      background: var(--panel);
      border: 1px solid var(--border);
      border-radius: 8px;
      box-shadow: var(--shadow);
      padding: 22px;
      margin-bottom: 18px;
      scroll-margin-top: 18px;
    }

    .quick-grid,
    .status-grid,
    .branch-grid {
      display: grid;
      gap: 12px;
    }

    .quick-grid {
      grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
      margin-top: 18px;
    }

    .status-grid,
    .branch-grid {
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      margin-top: 14px;
    }

    .summary-item {
      background: var(--panel-soft);
      border: 1px solid var(--border);
      border-radius: 8px;
      padding: 14px;
    }

    .summary-item strong {
      display: block;
      margin-bottom: 6px;
      color: #102a63;
    }

    .summary-item p:last-child {
      margin-bottom: 0;
    }

    code {
      background: #eef2f7;
      padding: 2px 6px;
      border-radius: 6px;
      font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, "Liberation Mono", monospace;
      font-size: 0.95em;
    }

    pre {
      background: var(--code-bg);
      color: var(--code-text);
      border: 1px solid #243248;
      border-radius: 8px;
      padding: 16px 54px 16px 16px;
      overflow-x: auto;
      margin: 12px 0 18px;
    }

    pre code {
      background: transparent;
      padding: 0;
      color: inherit;
      border-radius: 0;
    }

    .code-block {
      position: relative;
    }

    .copy-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      width: 32px;
      height: 32px;
      border: 1px solid rgba(148, 163, 184, 0.4);
      border-radius: 8px;
      background: rgba(15, 23, 42, 0.92);
      color: #dbeafe;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .copy-btn[data-copied="true"] {
      background: #1d4ed8;
      border-color: #93c5fd;
      color: #ffffff;
    }

    .copy-btn svg {
      width: 16px;
      height: 16px;
    }

    .note,
    .tip,
    .warning,
    .success {
      padding: 14px 16px;
      border-radius: 8px;
      margin: 14px 0;
    }

    .note,
    .tip {
      background: #eef6ff;
      border: 1px solid #b9d9ff;
      color: #173e71;
    }

    .warning {
      background: var(--warn-bg);
      border: 1px solid #ffd27a;
      color: var(--warn);
    }

    .success {
      background: var(--ok-bg);
      border: 1px solid #b7e4c7;
      color: var(--ok);
    }

    table {
      width: 100%;
      border-collapse: collapse;
      border: 1px solid var(--border);
      margin: 16px 0;
    }

    th,
    td {
      padding: 12px;
      text-align: left;
      vertical-align: top;
      border-bottom: 1px solid var(--border);
    }

    th {
      background: #f0f4ff;
      color: #12275c;
    }

    tr:last-child td {
      border-bottom: 0;
    }

    ul,
    ol {
      padding-left: 22px;
    }

    footer {
      width: min(1400px, calc(100% - 32px));
      margin: 0 auto 40px;
      color: var(--muted);
    }

    @media (max-width: 980px) {
      .page-wrap {
        grid-template-columns: 1fr;
      }

      .sidebar {
        position: static;
        max-height: none;
      }
    }
  </style>
</head>
<body>
  <header>
    <div class="header-wrap">
      <h1>Git Branching Guide</h1>
      <p class="lead">
        This page explains local branches, remote branches, feature branching, merge flow, and how to tell whether you are working locally or against a remote such as GitHub.
      </p>
    </div>
  </header>

  <div class="page-wrap">
    <aside class="sidebar" aria-label="Section navigation">
      <h2>Section Menu</h2>
      <ol>
        <li><a href="#basic-idea">The basic idea</a></li>
        <li><a href="#check-where">Check where you are</a></li>
        <li><a href="#branch-types">Branch types</a></li>
        <li><a href="#create-branch">Create a branch</a></li>
        <li><a href="#work-commit">Work and commit locally</a></li>
        <li><a href="#local-vs-remote">Local vs remote</a></li>
        <li><a href="#push-branch">Push a branch</a></li>
        <li><a href="#merge-feature">Merge a feature branch</a></li>
        <li><a href="#merge-conflict">Merge conflicts</a></li>
        <li><a href="#fetch-pull">Fetch vs pull</a></li>
        <li><a href="#remote-tracking">Remote-tracking branches</a></li>
        <li><a href="#codex-remote">If Codex works on a remote</a></li>
        <li><a href="#full-example">Full example you can run</a></li>
        <li><a href="#delete-branch">Delete a branch</a></li>
        <li><a href="#cheat-sheet">Cheat sheet</a></li>
      </ol>

      <div class="mini-note">
        This menu stays visible on desktop so you can jump to any numbered section without scrolling back up.
      </div>
    </aside>

    <main class="content">
      <section>
        <h2>Quick Summary</h2>
        <p>Use this first if you want the short version.</p>

        <div class="quick-grid">
          <div class="summary-item">
            <strong>Local branch</strong>
            <p>A branch like <code>main</code> or <code>feature/login</code> in your own clone on disk.</p>
          </div>
          <div class="summary-item">
            <strong>Remote branch</strong>
            <p>A branch stored on GitHub, GitLab, or another server, usually shown locally as <code>origin/main</code>.</p>
          </div>
          <div class="summary-item">
            <strong>Feature branching</strong>
            <p>Create one branch per change, commit there, then merge that branch back.</p>
          </div>
          <div class="summary-item">
            <strong>Safe beginner flow</strong>
            <p>Update <code>main</code>, create branch, commit locally, push branch, merge branch, pull on other machines.</p>
          </div>
        </div>
      </section>

      <section id="basic-idea">
        <h2>1. The Basic Idea</h2>
        <p>
          A branch is a named line of work. It lets you change code without immediately changing another branch.
        </p>
        <p>
          In most projects, the stable branch is <code>main</code> or <code>master</code>. A feature branch is where you do one specific task, for example <code>feature/navbar</code> or <code>bugfix/login-error</code>.
        </p>
      </section>

      <section id="check-where">
        <h2>2. Check Where You Are</h2>
        <p>Before you create, merge, or push branches, check your current state.</p>

        <pre><code>git status
git branch --show-current
git branch -vv
git remote -v</code></pre>

        <div class="status-grid">
          <div class="summary-item">
            <strong><code>git status</code></strong>
            <p>Shows your current branch and whether you have uncommitted local changes.</p>
          </div>
          <div class="summary-item">
            <strong><code>git branch --show-current</code></strong>
            <p>Shows only the current local branch name.</p>
          </div>
          <div class="summary-item">
            <strong><code>git branch -vv</code></strong>
            <p>Shows whether your local branch tracks a remote branch such as <code>origin/main</code>.</p>
          </div>
          <div class="summary-item">
            <strong><code>git remote -v</code></strong>
            <p>Shows which remote server URL your repository is linked to.</p>
          </div>
        </div>

        <div class="warning">
          Before switching branches or merging, keep the working tree clean when possible. That means commit your changes or stash them deliberately.
        </div>
      </section>

      <section id="branch-types">
        <h2>3. Branch Types</h2>
        <p>These names are conventions. Git itself does not enforce them, but teams use them for clarity.</p>

        <div class="branch-grid">
          <div class="summary-item">
            <strong><code>main</code> or <code>master</code></strong>
            <p>The primary branch. Usually the branch you deploy from or protect the most.</p>
          </div>
          <div class="summary-item">
            <strong><code>feature/...</code></strong>
            <p>New work. Example: <code>feature/left-sidebar</code>. This is the normal branch type for one task.</p>
          </div>
          <div class="summary-item">
            <strong><code>bugfix/...</code></strong>
            <p>Fixes a defect without mixing in unrelated work.</p>
          </div>
          <div class="summary-item">
            <strong><code>hotfix/...</code></strong>
            <p>Urgent production fix, usually merged back quickly.</p>
          </div>
          <div class="summary-item">
            <strong><code>release/...</code></strong>
            <p>Optional staging branch used by some teams before a release.</p>
          </div>
          <div class="summary-item">
            <strong><code>experiment/...</code></strong>
            <p>Temporary branch for testing ideas you may or may not keep.</p>
          </div>
        </div>

        <div class="tip">
          Feature branching means one branch for one piece of work. That keeps changes isolated and makes merging easier.
        </div>
      </section>

      <section id="create-branch">
        <h2>4. Create a Branch</h2>
        <p>Start from the base branch you want to branch from, usually <code>main</code>.</p>

        <pre><code>git switch main
git pull origin main
git switch -c feature/my-change</code></pre>

        <p>
          This means: move to <code>main</code>, update it from the remote, then create a new local feature branch from that point.
        </p>

        <div class="note">
          Older tutorials use <code>git checkout -b feature/my-change</code>. It still works. <code>git switch -c</code> is clearer.
        </div>
      </section>

      <section id="work-commit">
        <h2>5. Work and Commit Locally</h2>
        <p>
          Git work starts locally. When you edit files in your project folder, those changes are local until you commit and push them.
        </p>

        <pre><code>git status
git diff
git add .
git commit -m "Add fixed left sidebar navigation"</code></pre>

        <p>
          A commit is still local. It exists only in your clone until you push it to a remote.
        </p>
      </section>

      <section id="local-vs-remote">
        <h2>6. Local vs Remote</h2>
        <p>
          This is one of the most important Git distinctions:
        </p>

        <table>
          <thead>
            <tr>
              <th>Thing</th>
              <th>What it means</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><code>main</code></td>
              <td>Your local branch in the repository on your machine.</td>
            </tr>
            <tr>
              <td><code>origin/main</code></td>
              <td>Your local record of what Git last knows about the remote <code>main</code> branch.</td>
            </tr>
            <tr>
              <td>Remote server</td>
              <td>The actual repository on GitHub, GitLab, or another hosted service.</td>
            </tr>
          </tbody>
        </table>

        <p>
          You do not work directly inside <code>origin/main</code>. You work on a local branch such as <code>main</code> or <code>feature/my-change</code>.
        </p>

        <div class="success">
          Simple rule: if you edited files in your folder, you are working locally. If you want the server to receive those changes, you must push.
        </div>

        <h3>How to know if you are local or synced with remote</h3>
        <pre><code>git status
git branch -vv
git fetch origin
git status</code></pre>

        <p>
          After <code>git fetch origin</code>, Git updates its knowledge of the server. Then <code>git status</code> and <code>git branch -vv</code> become more reliable for ahead/behind information.
        </p>
      </section>

      <section id="push-branch">
        <h2>7. Push a Branch</h2>
        <p>After committing locally, push the branch to the remote server.</p>

        <pre><code>git push -u origin feature/my-change</code></pre>

        <p>
          The first push uses <code>-u</code> to connect your local branch to its remote branch. After that, while you stay on the same branch, you can usually use:
        </p>

        <pre><code>git push</code></pre>

        <div class="tip">
          <strong><code>git push</code> does not push every branch.</strong> It pushes the current local branch to the remote branch linked to it.
        </div>

        <h3>How to check what branch will be pushed</h3>
        <pre><code>git branch -vv</code></pre>

        <p>
          If you see <code>[origin/feature/my-change]</code>, your local branch is linked to that remote branch.
        </p>
      </section>

      <section id="merge-feature">
        <h2>8. Merge a Feature Branch</h2>
        <p>
          Merging means bringing the full content of one branch into another branch.
        </p>

        <h3>Feature branching flow</h3>
        <ol>
          <li>Start from <code>main</code>.</li>
          <li>Create <code>feature/...</code>.</li>
          <li>Commit all work on that feature branch.</li>
          <li>Return to <code>main</code>.</li>
          <li>Merge the feature branch into <code>main</code>.</li>
        </ol>

        <pre><code>git switch main
git pull origin main
git merge feature/my-change
git push origin main</code></pre>

        <p>
          Read the merge command literally: "I am on <code>main</code>, and I want to bring <code>feature/my-change</code> into this branch."
        </p>

        <div class="note">
          Merge works best when the feature branch contains one coherent task. That is the main reason feature branching is useful.
        </div>
      </section>

      <section id="merge-conflict">
        <h2>9. Merge Conflicts</h2>
        <p>
          A conflict happens when Git cannot decide which version of a changed section to keep.
        </p>

        <pre><code>git status</code></pre>

        <p>You may see markers like this:</p>

        <pre><code>&lt;&lt;&lt;&lt;&lt;&lt;&lt; HEAD
code from current branch
=======
code from merged branch
&gt;&gt;&gt;&gt;&gt;&gt;&gt; feature/my-change</code></pre>

        <p>Resolve the file, then continue:</p>

        <pre><code>git add path/to/file
git commit</code></pre>

        <p>To cancel the merge:</p>

        <pre><code>git merge --abort</code></pre>
      </section>

      <section id="fetch-pull">
        <h2>10. Fetch vs Pull</h2>
        <table>
          <thead>
            <tr>
              <th>Command</th>
              <th>What it does</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><code>git fetch</code></td>
              <td>Downloads remote updates into remote-tracking branches like <code>origin/main</code>, but does not merge them into your current branch.</td>
            </tr>
            <tr>
              <td><code>git pull</code></td>
              <td>Fetches first, then merges or rebases those remote updates into your current local branch.</td>
            </tr>
          </tbody>
        </table>

        <pre><code>git fetch origin
git log --oneline origin/main
git merge origin/main</code></pre>

        <p>
          That is the manual version. The shortcut is:
        </p>

        <pre><code>git pull origin main</code></pre>

        <div class="warning">
          Use <code>fetch</code> when you want to inspect remote changes first. Use <code>pull</code> when you are ready to bring them into your current branch.
        </div>
      </section>

      <section id="remote-tracking">
        <h2>11. Remote-Tracking Branches</h2>
        <p>
          A name like <code>origin/main</code> is not the server itself. It is your local snapshot of what Git last fetched from the server.
        </p>

        <pre><code>git branch -r
git branch -a
git log --oneline origin/main</code></pre>

        <p>
          If someone else pushes to GitHub, your machine does not know immediately. You must run <code>git fetch</code> or <code>git pull</code> to update your local knowledge.
        </p>
      </section>

      <section id="codex-remote">
        <h2>12. If Codex Works on a Remote</h2>
        <p>
          In normal Git usage, work should still land in a branch somewhere. The question is where the commit is created and where you later pull it from.
        </p>

        <h3>Case A: Codex edits your local repository</h3>
        <p>
          This is the simple case. Codex changes files in your local clone. You review, commit, and push from your machine.
        </p>

        <h3>Case B: Codex commits to a remote branch</h3>
        <p>
          In that case the remote branch moves first, and your local clone becomes behind that remote branch until you fetch or pull.
        </p>

        <pre><code>git fetch origin
git switch your-branch
git pull origin your-branch</code></pre>

        <p>
          If the branch does not exist locally yet:
        </p>

        <pre><code>git fetch origin
git switch -c your-branch --track origin/your-branch</code></pre>

        <div class="note">
          So if Codex works on the remote first, the mechanism is: remote branch changes, then your local clone fetches that branch, then your local branch pulls or tracks it.
        </div>

        <h3>What happens in practice</h3>
        <ol>
          <li>Remote branch receives new commits.</li>
          <li>Your local clone still has old state.</li>
          <li><code>git fetch</code> updates <code>origin/...</code>.</li>
          <li><code>git pull</code> or <code>git merge origin/...</code> brings those commits into your local branch.</li>
        </ol>
      </section>

      <section id="full-example">
        <h2>13. Full Example You Can Run</h2>
        <p>
          This example assumes the project already has a remote named <code>origin</code> and a stable branch named <code>main</code>.
        </p>

        <pre><code># Check current state
git status
git branch -vv

# Update local main from the server
git switch main
git pull origin main

# Create a feature branch
git switch -c feature/left-panel

# Work on files, then review
git status
git diff

# Commit locally
git add .
git commit -m "Add fixed left panel navigation to Git lesson"

# Push the feature branch to the remote
git push -u origin feature/left-panel

# Later, merge it back into main
git switch main
git pull origin main
git merge feature/left-panel
git push origin main</code></pre>

        <h3>If the remote was changed first by someone else</h3>
        <pre><code># Update your knowledge of the remote
git fetch origin

# See whether your local branch is behind
git branch -vv

# Bring remote changes into local main
git switch main
git pull origin main</code></pre>
      </section>

      <section id="delete-branch">
        <h2>14. Delete a Branch</h2>
        <p>
          Deleting a branch locally and deleting a branch remotely are two different operations.
        </p>

        <table>
          <thead>
            <tr>
              <th>Action</th>
              <th>Command</th>
              <th>What it affects</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Delete local branch</td>
              <td><code>git branch -d feature/my-change</code></td>
              <td>Removes only your local branch.</td>
            </tr>
            <tr>
              <td>Force delete local branch</td>
              <td><code>git branch -D feature/my-change</code></td>
              <td>Removes only your local branch, even if it was not merged.</td>
            </tr>
            <tr>
              <td>Delete remote branch</td>
              <td><code>git push origin --delete feature/my-change</code></td>
              <td>Removes the branch from the remote server.</td>
            </tr>
          </tbody>
        </table>

        <h3>Delete only the local branch</h3>
        <pre><code>git branch -d feature/my-change</code></pre>

        <p>
          Use <code>-d</code> when the branch was already merged. Git will stop you if the branch still contains unmerged work.
        </p>

        <h3>Force delete only the local branch</h3>
        <pre><code>git branch -D feature/my-change</code></pre>

        <p>
          Use <code>-D</code> only when you are sure you do not need the unmerged work anymore.
        </p>

        <h3>Delete only the remote branch</h3>
        <pre><code>git push origin --delete feature/my-change</code></pre>

        <p>
          This deletes the branch on GitHub or another remote, but it does not automatically remove your local branch.
        </p>

        <h3>If you deleted the branch remotely</h3>
        <p>
          Your local repository may still show old remote-tracking information until you fetch and prune.
        </p>

        <pre><code>git fetch --prune origin
git branch -r</code></pre>

        <p>
          If you still have the local branch and want to remove it too:
        </p>

        <pre><code>git branch -d feature/my-change</code></pre>

        <h3>If you deleted the branch locally</h3>
        <p>
          The remote branch still exists until you delete it from the server.
        </p>

        <pre><code>git push origin --delete feature/my-change</code></pre>

        <div class="warning">
          Deleting a branch in one place does not delete it everywhere. Local branch deletion and remote branch deletion are separate steps.
        </div>
      </section>

      <section id="cheat-sheet">
        <h2>15. Cheat Sheet</h2>
        <table>
          <thead>
            <tr>
              <th>Command</th>
              <th>Meaning</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><code>git status</code></td>
              <td>Show current branch and working tree state.</td>
            </tr>
            <tr>
              <td><code>git branch --show-current</code></td>
              <td>Show current local branch.</td>
            </tr>
            <tr>
              <td><code>git branch -vv</code></td>
              <td>Show branch tracking and ahead/behind status.</td>
            </tr>
            <tr>
              <td><code>git remote -v</code></td>
              <td>Show configured remotes.</td>
            </tr>
            <tr>
              <td><code>git switch -c feature/x</code></td>
              <td>Create and switch to a new local branch.</td>
            </tr>
            <tr>
              <td><code>git push -u origin feature/x</code></td>
              <td>Create or update the remote branch and set upstream tracking.</td>
            </tr>
            <tr>
              <td><code>git fetch origin</code></td>
              <td>Download remote updates without merging them.</td>
            </tr>
            <tr>
              <td><code>git pull origin main</code></td>
              <td>Fetch and merge remote <code>main</code> into local <code>main</code>.</td>
            </tr>
            <tr>
              <td><code>git merge feature/x</code></td>
              <td>Bring the whole feature branch into the current branch.</td>
            </tr>
            <tr>
              <td><code>git branch -r</code></td>
              <td>List remote-tracking branches.</td>
            </tr>
            <tr>
              <td><code>git branch -d feature/x</code></td>
              <td>Delete the local branch if it was already merged.</td>
            </tr>
            <tr>
              <td><code>git branch -D feature/x</code></td>
              <td>Force delete the local branch even if it was not merged.</td>
            </tr>
            <tr>
              <td><code>git push origin --delete feature/x</code></td>
              <td>Delete the branch on the remote server.</td>
            </tr>
            <tr>
              <td><code>git fetch --prune origin</code></td>
              <td>Refresh remote-tracking branches after a remote branch was deleted.</td>
            </tr>
          </tbody>
        </table>
      </section>
    </main>
  </div>

  <footer>
    <p>
      Recommended beginner workflow: keep work in a local feature branch, push that branch to the remote, then merge it into <code>main</code> only when the whole task is ready.
    </p>
  </footer>

  <script>
    (function () {
      function fallbackCopy(text) {
        var textarea = document.createElement("textarea");
        textarea.value = text;
        textarea.setAttribute("readonly", "");
        textarea.style.position = "absolute";
        textarea.style.left = "-9999px";
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand("copy");
        document.body.removeChild(textarea);
      }

      document.querySelectorAll("pre").forEach(function (pre) {
        if (pre.parentElement && pre.parentElement.classList.contains("code-block")) {
          return;
        }

        var wrapper = document.createElement("div");
        wrapper.className = "code-block";
        pre.parentNode.insertBefore(wrapper, pre);
        wrapper.appendChild(pre);

        var button = document.createElement("button");
        button.type = "button";
        button.className = "copy-btn";
        button.dataset.copied = "false";
        button.setAttribute("aria-label", "Copy code");
        button.setAttribute("title", "Copy code");
        button.innerHTML =
          '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true">' +
          '<path d="M9 9.75A2.25 2.25 0 0 1 11.25 7.5h7.5A2.25 2.25 0 0 1 21 9.75v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5A2.25 2.25 0 0 1 9 17.25v-7.5Z" stroke="currentColor" stroke-width="1.5"/>' +
          '<path d="M15 7.5V6.75A2.25 2.25 0 0 0 12.75 4.5h-7.5A2.25 2.25 0 0 0 3 6.75v7.5a2.25 2.25 0 0 0 2.25 2.25H6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>' +
          "</svg>";

        button.addEventListener("click", function () {
          var text = pre.innerText.replace(/\s+$/, "");
          var done = function () {
            button.dataset.copied = "true";
            button.setAttribute("title", "Copied");
            window.setTimeout(function () {
              button.dataset.copied = "false";
              button.setAttribute("title", "Copy code");
            }, 1400);
          };

          if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(text).then(done).catch(function () {
              fallbackCopy(text);
              done();
            });
            return;
          }

          fallbackCopy(text);
          done();
        });

        wrapper.appendChild(button);
      });
    })();
  </script>
</body>
</html>
