<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Git Branching, Commit, Merge, and Cherry-Pick Guide</title>
  <style>
    :root {
      --bg: #f7f8fb;
      --card: #ffffff;
      --text: #1d2433;
      --muted: #5b6475;
      --border: #d9deea;
      --accent: #2457c5;
      --accent-soft: #e8efff;
      --warning: #8a5a00;
      --warning-bg: #fff4d8;
      --ok: #146c43;
      --ok-bg: #e9f7ef;
      --code-bg: #111827;
      --code-text: #e5e7eb;
    }

    body {
      margin: 0;
      background: var(--bg);
      color: var(--text);
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
      line-height: 1.6;
    }

    header {
      background: linear-gradient(135deg, #1f4fb2, #0f766e);
      color: white;
      padding: 48px 24px;
    }

    header .wrap,
    main {
      max-width: 980px;
      margin: 0 auto;
    }

    h1 {
      margin: 0 0 12px;
      font-size: clamp(2rem, 4vw, 3rem);
      line-height: 1.1;
    }

    h2 {
      margin-top: 0;
      color: #0f2355;
      font-size: 1.6rem;
    }

    h3 {
      color: #172554;
      margin-bottom: 8px;
    }

    p {
      margin: 0 0 16px;
    }

    main {
      padding: 28px 18px 56px;
    }

    section,
    .card {
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 16px;
      padding: 24px;
      margin: 18px 0;
      box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04);
    }

    .lead {
      font-size: 1.08rem;
      max-width: 760px;
      opacity: 0.95;
    }

    .quick-flow {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(170px, 1fr));
      gap: 12px;
      margin-top: 18px;
    }

    .step-box {
      background: var(--accent-soft);
      border: 1px solid #c9d8ff;
      border-radius: 12px;
      padding: 14px;
      font-weight: 650;
      color: #12327a;
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
      padding: 16px;
      border-radius: 12px;
      overflow-x: auto;
      margin: 12px 0 18px;
      border: 1px solid #253044;
    }

    pre code {
      background: transparent;
      color: inherit;
      padding: 0;
      border-radius: 0;
      font-size: 0.95rem;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin: 16px 0;
      overflow: hidden;
      border-radius: 12px;
      border: 1px solid var(--border);
    }

    th,
    td {
      text-align: left;
      vertical-align: top;
      padding: 12px;
      border-bottom: 1px solid var(--border);
    }

    th {
      background: #f0f4ff;
      color: #12275c;
    }

    tr:last-child td {
      border-bottom: 0;
    }

    .note,
    .warning,
    .success {
      border-radius: 12px;
      padding: 14px 16px;
      margin: 14px 0;
    }

    .note {
      background: #eef6ff;
      border: 1px solid #b9d9ff;
      color: #173e71;
    }

    .warning {
      background: var(--warning-bg);
      border: 1px solid #ffd27a;
      color: var(--warning);
    }

    .success {
      background: var(--ok-bg);
      border: 1px solid #b7e4c7;
      color: var(--ok);
    }

    ul,
    ol {
      padding-left: 22px;
    }

    .decision {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 14px;
    }

    .decision .card {
      margin: 0;
      box-shadow: none;
    }

    footer {
      max-width: 980px;
      margin: 0 auto 40px;
      padding: 0 18px;
      color: var(--muted);
      font-size: 0.95rem;
    }
  </style>
</head>
<body>
  <header>
    <div class="wrap">
      <h1>Git Branching, Commit, Merge, and Cherry-Pick Guide</h1>
      <p class="lead">
        A practical beginner-friendly document for creating a branch, working on it, committing changes, merging it back into the original branch, and choosing between merge and cherry-pick.
      </p>
    </div>
  </header>

  <main>
    <section>
      <h2>1. The basic idea</h2>
      <p>
        A <strong>branch</strong> is a separate line of work. You create a branch when you want to change code without touching the original branch immediately.
      </p>
      <p>
        The original branch is often called <code>main</code>, <code>master</code>, or <code>develop</code>. In this guide, the original branch is called <code>main</code>. Replace <code>main</code> with your real branch name if needed.
      </p>

      <div class="quick-flow">
        <div class="step-box">1. Start on main</div>
        <div class="step-box">2. Create a feature branch</div>
        <div class="step-box">3. Edit files</div>
        <div class="step-box">4. Commit changes</div>
        <div class="step-box">5. Merge back to main</div>
      </div>
    </section>

    <section>
      <h2>2. Check where you are</h2>
      <p>Before creating or merging branches, check your current branch and your working state.</p>

      <pre><code>git status
git branch --show-current
git branch</code></pre>

      <p>
        <code>git status</code> tells you whether you have uncommitted changes. It is one of the most important Git commands.
      </p>

      <div class="warning">
        <strong>Important:</strong> Before switching branches or merging, try to keep your working tree clean. That means your changes are either committed or intentionally stashed.
      </div>
    </section>

    <section>
      <h2>3. Create a new branch</h2>
      <p>Start from the original branch, usually <code>main</code>.</p>

      <pre><code>git switch main
git pull origin main</code></pre>

      <p>Create and move to a new branch:</p>

      <pre><code>git switch -c feature/my-change</code></pre>

      <p>
        Example branch names:
      </p>
      <ul>
        <li><code>feature/login-page</code></li>
        <li><code>bugfix/navbar-error</code></li>
        <li><code>experiment/new-dashboard</code></li>
      </ul>

      <div class="note">
        Older Git tutorials use <code>git checkout -b feature/my-change</code>. That still works, but <code>git switch -c</code> is clearer for branch switching.
      </div>
    </section>

    <section>
      <h2>4. Work on the branch</h2>
      <p>Now you are inside your new branch. Edit your files normally in your code editor.</p>

      <p>After editing, check what changed:</p>

      <pre><code>git status
git diff</code></pre>

      <p>
        <code>git diff</code> shows the actual line-by-line changes before you commit.
      </p>
    </section>

    <section>
      <h2>5. Add and commit changes in the branch</h2>
      <p>After you make a change, stage the files you want to commit.</p>

      <pre><code>git add path/to/file</code></pre>

      <p>Or stage all changed files:</p>

      <pre><code>git add .</code></pre>

      <p>Then commit:</p>

      <pre><code>git commit -m "Describe what you changed"</code></pre>

      <p>Example:</p>

      <pre><code>git add src/App.js
git commit -m "Fix navbar mobile layout"</code></pre>

      <div class="success">
        Good commit messages are short but specific. Example: <code>Fix navbar mobile layout</code> is better than <code>changes</code>.
      </div>
    </section>

    <section>
      <h2>6. Push your branch to GitHub or remote repository</h2>
      <p>If you are using GitHub, GitLab, Bitbucket, or another remote repository, push the branch:</p>

      <pre><code>git push -u origin feature/my-change</code></pre>

      <p>
        The <code>-u</code> connects your local branch to the remote branch. After this first push, you can usually just use:
      </p>

      <pre><code>git push</code></pre>
    </section>

    <section>
      <h2>7. Merge the branch back into the original branch</h2>
      <p>
        Use <strong>merge</strong> when you want to bring the whole branch into the original branch.
      </p>

      <p>First, switch back to the original branch:</p>

      <pre><code>git switch main</code></pre>

      <p>Make sure the original branch is up to date:</p>

      <pre><code>git pull origin main</code></pre>

      <p>Merge your feature branch into <code>main</code>:</p>

      <pre><code>git merge feature/my-change</code></pre>

      <p>Push the updated original branch:</p>

      <pre><code>git push origin main</code></pre>

      <div class="note">
        Read the merge command as: “I am currently on <code>main</code>, and I want to bring <code>feature/my-change</code> into <code>main</code>.”
      </div>
    </section>

    <section>
      <h2>8. What if there is a merge conflict?</h2>
      <p>
        A conflict happens when Git cannot automatically decide which version of a file to keep.
      </p>

      <p>Git will show conflicted files. Check them with:</p>

      <pre><code>git status</code></pre>

      <p>Open the conflicted file. You may see something like this:</p>

      <pre><code>&lt;&lt;&lt;&lt;&lt;&lt;&lt; HEAD
Code from main
=======
Code from feature/my-change
&gt;&gt;&gt;&gt;&gt;&gt;&gt; feature/my-change</code></pre>

      <p>
        Edit the file manually and keep the correct version. Then continue:
      </p>

      <pre><code>git add path/to/conflicted-file
git commit</code></pre>

      <p>
        If you want to cancel the merge instead:
      </p>

      <pre><code>git merge --abort</code></pre>
    </section>

    <section>
      <h2>9. Cherry-pick: take only one commit from another branch</h2>
      <p>
        Use <strong>cherry-pick</strong> when you do <em>not</em> want the whole branch. You only want one specific commit, or a few specific commits.
      </p>

      <p>First, find the commit hash from the branch:</p>

      <pre><code>git log --oneline feature/my-change</code></pre>

      <p>You might see something like:</p>

      <pre><code>a1b2c3d Fix navbar mobile layout
9f8e7d6 Add temporary experiment
4a5b6c7 Update dashboard copy</code></pre>

      <p>Switch to the branch that should receive the commit:</p>

      <pre><code>git switch main</code></pre>

      <p>Cherry-pick the commit you want:</p>

      <pre><code>git cherry-pick a1b2c3d</code></pre>

      <p>Push the result:</p>

      <pre><code>git push origin main</code></pre>

      <div class="warning">
        Cherry-pick creates a new commit with a new commit hash. It copies the change; it does not move the original commit.
      </div>
    </section>

    <section>
      <h2>10. Cherry-pick multiple commits</h2>
      <p>Cherry-pick several separate commits:</p>

      <pre><code>git cherry-pick a1b2c3d 4a5b6c7</code></pre>

      <p>Cherry-pick a consecutive range of commits:</p>

      <pre><code>git cherry-pick abc123^..def456</code></pre>

      <p>
        This means: include <code>abc123</code> through <code>def456</code>.
      </p>
    </section>

    <section>
      <h2>11. What if cherry-pick has a conflict?</h2>
      <p>Check the conflict:</p>

      <pre><code>git status</code></pre>

      <p>Fix the files manually, then continue:</p>

      <pre><code>git add path/to/file
git cherry-pick --continue</code></pre>

      <p>Cancel the cherry-pick:</p>

      <pre><code>git cherry-pick --abort</code></pre>
    </section>

    <section>
      <h2>12. Merge vs cherry-pick: which one is easier?</h2>
      <table>
        <thead>
          <tr>
            <th>Situation</th>
            <th>Use this</th>
            <th>Why</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>You want the whole branch</td>
            <td><strong>Merge</strong></td>
            <td>It brings all commits from the branch into the original branch.</td>
          </tr>
          <tr>
            <td>You only want one specific commit</td>
            <td><strong>Cherry-pick</strong></td>
            <td>It copies only the selected commit.</td>
          </tr>
          <tr>
            <td>You are a beginner and the branch contains only the changes you want</td>
            <td><strong>Merge</strong></td>
            <td>Usually simpler and easier to understand.</td>
          </tr>
          <tr>
            <td>The branch has experimental commits you do not want</td>
            <td><strong>Cherry-pick</strong></td>
            <td>You can choose only the safe commits.</td>
          </tr>
          <tr>
            <td>You want to keep clear project history</td>
            <td><strong>Merge or Pull Request</strong></td>
            <td>Better for normal team workflows.</td>
          </tr>
        </tbody>
      </table>

      <div class="success">
        Simple rule: <strong>merge is easier when you want everything</strong>. <strong>Cherry-pick is better when you want only selected commits</strong>.
      </div>
    </section>

    <section>
      <h2>13. Safe practice before merging</h2>
      <p>If you are not sure, create a backup branch before merging:</p>

      <pre><code>git switch main
git branch backup/main-before-merge</code></pre>

      <p>Or test the merge on a temporary branch first:</p>

      <pre><code>git switch main
git switch -c test-merge
git merge feature/my-change</code></pre>

      <p>
        If the test merge looks good, go back to <code>main</code> and do the real merge.
      </p>
    </section>

    <section>
      <h2>14. Full example workflow</h2>
      <p>This is a complete example from start to finish.</p>

      <pre><code># Start from the original branch
git switch main
git pull origin main

# Create a new branch
git switch -c feature/navbar-fix

# Edit files in your editor, then check changes
git status
git diff

# Commit the change
git add src/Navbar.js
git commit -m "Fix navbar layout on mobile"

# Push the feature branch
git push -u origin feature/navbar-fix

# Merge back into original branch
git switch main
git pull origin main
git merge feature/navbar-fix
git push origin main</code></pre>
    </section>

    <section>
      <h2>15. Full cherry-pick example</h2>
      <p>Use this when you only want one commit from the branch.</p>

      <pre><code># Find the commit you want
git log --oneline feature/navbar-fix

# Move to the branch that should receive the commit
git switch main
git pull origin main

# Copy only one commit into main
git cherry-pick a1b2c3d

# Push the result
git push origin main</code></pre>
    </section>

    <section>
      <h2>16. Useful commands cheat sheet</h2>
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
            <td>Show current branch and changed files.</td>
          </tr>
          <tr>
            <td><code>git branch</code></td>
            <td>List local branches.</td>
          </tr>
          <tr>
            <td><code>git switch branch-name</code></td>
            <td>Move to another branch.</td>
          </tr>
          <tr>
            <td><code>git switch -c new-branch</code></td>
            <td>Create a new branch and move to it.</td>
          </tr>
          <tr>
            <td><code>git add .</code></td>
            <td>Stage all changed files.</td>
          </tr>
          <tr>
            <td><code>git commit -m "message"</code></td>
            <td>Save staged changes as a commit.</td>
          </tr>
          <tr>
            <td><code>git merge branch-name</code></td>
            <td>Bring another branch into your current branch.</td>
          </tr>
          <tr>
            <td><code>git cherry-pick commit-hash</code></td>
            <td>Copy one commit into your current branch.</td>
          </tr>
          <tr>
            <td><code>git log --oneline</code></td>
            <td>Show commits in a short format.</td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>

  <footer>
    <p>
      Recommended beginner workflow: create a branch, make small commits, merge when the whole branch is ready, and use cherry-pick only when you need selected commits.
    </p>
  </footer>
</body>
</html>
