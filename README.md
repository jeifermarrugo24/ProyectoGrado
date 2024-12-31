https://michaelrigart.be/git-workflow-master-origin-upstream-production/

# lets you get and set configuration variables that control all aspects of how Git looks and operates. If you pass the option --system to git config, it reads and writes from one of these files (below) specifically.

$ git config [--system] [--global]

1. /etc/gitconfig file: Contains values for every user on the system and all their repositories.
2. ~/.gitconfig or ~/.config/git/config file: Specific to your user. You can make Git read and write to this file specifically by passing the -- global option.
3. ./.git/config = Specific to that single repository
   --global: if you pass the --global option, Git will always use that information for anything you do on that system. If you want to override this with a different name or email address for specific projects, you can run the command without the --global option when you’re in that project.

# setup git default editor, if not configured, it will use system defult editor

$ git config --global core.editor emacs

# man page for help

$ man git-config

# list all the settings Git can find at that point

$ git config --list

# turn off the pager, it is 'less' by default

$ git config --global core.pager ''

# change the commit message template

$ git config --global commit.template ~/.gitmessage.txt

# signing annoted tags easily with config settings

$ git config --global user.signingkey

# Now, you can sign tags without having to specify your key every time with the git tag command:

$ git tag -s

# setup global gitignore

$ git config --global help.autocorrect 1

# change to a different mergetool

# tell Git what strategy to use

$ git config --global merge.tool extMerge

# specify how to run the command

$ git config --global mergetool.extMerge.cmd \
 'extMerge \"$BASE\" \"$LOCAL\" \"$REMOTE\" \"$MERGED\"'

# Git if the exit code of that program indicates a successful merge resolution or not

$ git config --global mergetool.extMerge.trustExitCode false

# tell Git what command to run for diffs

$ git config --global diff.external extDiff

or you can edit your ~/.gitconfig file to add these lines:
[merge]
tool = extMerge
[mergetool "extMerge"]
cmd = extMerge "$BASE" "$LOCAL" "$REMOTE" "$MERGED"
trustExitCode = false
[diff]
external = extDiff

# After all this is set, if you run diff commands such as this:

$ git diff 32d1776b1^ 32d1776b1

# Instead of getting the diff output on the command line, Git fires up the new cmd you specified

# autocorrect easy misspelled commands

$ git config --global core.excludesfile ~/.gitignore_global

# setup the mergetool custom

$ git config --global merge.tool kdiff3

# formatting and whitespace

# convert CRLF to LF on commit

    $ git config --global core.autocrlf input

# convert LF to CRLF on commit

    $ git config --global core.autocrlf true

# turn off functionality

    $ git config --global core.autocrlf false

# CORE.WHITESPACE

# Git comes preset to detect and fix some whitespace issues. It can look for six

# primary whitespace issues – three are enabled by default and can be turned off,

# and three are disabled by default but can be activated.

    1. blank-at-eol (true, look for spaces at the end of a line;)
    2. blank-at-eof (true, notices blank lines at the end of a file)
    3. space-before-tab (true, looks for spaces before tabs at the beginning of a line)
    4. indentwith-non-tab (false, looks for lines that begin with spaces instead of tabs, and is controlled by the tabwidth option)
    5. tab-in-indent, (false, which watches for tabs in the indentation portion of a line)
    6. cr-at-eol, (false, which tells Git that carriage returns at the end of lines are OK)

$ git config --global core.whitespace trailing-space,space-before-tab,indent-with-non-tab # You can disable settings by either leaving them out of the setting string or prepending a - in front of the value

# user level .gitattributes

$ git config --global core.attributesfile

# project level .gitattributes

$ .git/info/attributes or /projectroot/.gitattributes

# add a filter, .gitattributes

$ echo \*.scss filter=myfilter-name > .gitattributes

# also, add filter to .git/config

    $ git config --global filter.myfilter-name.clean [/path/to/filter]
    $ git config --global filter.myfilter-name.smudge [/path/to/filter]

# set mergetool

$ git config --global mergetool.diffconflicts.cmd 'vim -c 'DiffConflicts' $MERGED $BASE $LOCAL $REMOTE'

# check a value for a setting

$ git config user.name

$ git config --global user.name "John Doe"
$ git config --global user.email johndoe@example.com

# If you don’t want to type your password every single time you push

$ git config --global credential.helper

# stores your password for default 900 seconds (15 min), the --timeout is optional

$ git config --global credential.helper 'cache --timeout 900'

# stores your password indefinitely in plaintext in the --file (optional) argument, default is ~/.git-credentials

$ git config --global credential.helper 'store --file ~/.git-credentials'

# or you can have it in .gitconfig

[credential]
helper = store --file /mnt/thumbdrive/.git-credentials
helper = cache --timeout 30000

# Git even allows you to configure several helpers. When looking for credentials

# for a particular host, Git will query them in order, and stop after the first

# answer is provided

# root command for credential helper system

$ git credential [fill|approve|reject] # The credential system is actually invoking a program that’s separate from Git # itself; which one and how depends on the credential.helper configuration # value. # so when you call it $ git credential, your actually calling $ git-credential-[credential.helper(store|cache|custom...)[args...]]
$ git credential-store --file ~/.git.store store # Here we tell git-credential-store to save some credentials: the username # “bob” and the password “s3cre7” are to be used when https:// # mygithost is accessed.
#: protocol=https
#: host=mygithost
#: username=bob
#: password=s3cre7
$ git credential-store --file ~/git.store get # Now we’ll retrieve those credentials. We provide the parts of the connection # we already know (https://mygithost), and an empty line. # git-credential-store replies with the username and password we stored # above.
#: protocol=https
#: host=mygithost
#: username=bob
#: password=s3cre7

# you can easily write your own Custom Credential Cache pg 377

$ git config --global user.signingkey 0A46826A

# turn on rerere

# When rerere is enabled, Git will keep a set of preand

# post-images from successful merges, and if it notices that there’s a conflict

# that looks exactly like one you’ve already fixed, it’ll just use the fix from last

# time, without bothering you with it.

    $ git config rerere.enabled true
    $ git config --global rerere.enabled true

# ~/.gitconfig, imap or smtp

# imap config setup

[imap]
folder = "[Gmail]/Drafts"
host = imaps://imap.gmail.com
user = user@gmail.com
pass = p4ssw0rd
port = 993
sslverify = false

# smtp config setup

[sendemail]
smtpencryption = tls
smtpserver = smtp.gmail.com
smtpuser = user@gmail.com
smtpserverport = 587

# sending mail via git, go to your Drafts folder, change the To

# field to the mailing list you’re sending the patch to, possibly CC the maintainer

# or person responsible for that section, and send it off.

# git imap-send, send patch via email, imap only

    $ cat *.patch |git imap-send

# git send-mail, send patch via email, smtp only

    $ git send-email *.patch

# git apply patch received in email

# It won’t create a commit for you – after running it, you must stage and commit the changes introduced manually

# git apply is an “apply all or abort all” model where either everything is applied or nothing is

$ git apply /tmp/patch-ruby-client.patch # check that patch is good first # If there is no output, then the patch should apply cleanly
$ git apply --check /tmp/patch-ruby-client.patch

# git patch, patch can partially apply patchfiles

$ git patch p1

# git am, apply a patch generated by format-patch

# If someone

# has emailed you the patch properly using git send-email, and you download

# that into an mbox format, then you can point git am to that mbox file, and it

# will start applying all the patches it sees

    $ git am 0001-limit-log-function.patch

# You can see that it applied cleanly and automatically created the new commit

# for you. The author information is taken from the email’s From and Date

# headers, and the message of the commit is taken from the Subject and body

# (before the patch) of the email.

    # if it fails, its much the same as a merge conflict, fix the files
    # then run, to continue to the next patch:
      $ git am --resolved


# merge from url from fork

# Jessica sends you an email saying that she has a great new

# feature in the ruby-client branch of her repository, you can test it by adding

# the remote and checking out that branch locally

    $ git remote add jessica git://github.com/jessica/myproject.git
    $ git fetch jessica
    $ git checkout -b rubyclient jessica/ruby-client

# HEAD

# pointer to the local branch you’re currently on

# ORIG_HEAD

# ORIG_HEAD is previous state of HEAD, set by commands that have possibly dangerous behavior, to be easy to revert them. It is less useful now that Git has reflog: HEAD@{1} is roughly equivalent to ORIG_HEAD (HEAD@{1} is always last value of HEAD, ORIG_HEAD is last value of HEAD before dangerous operation).

# list of files that changed from the last commit

$(git diff-tree -r --name-only --no-commit-id ORIG_HEAD HEAD)

# fast-forward

# when you try to merge one commit with a commit that can be reached by

# following the first commit’s history, Git simplifies things by moving the pointer

# forward because there is no divergent work to merge together – this is called a

# “fast-forward.”

# simple three-way merge

# Instead of just moving the branch pointer forward, Git creates a new snapshot

# that results from this three-way merge and automatically creates a new

# commit that points to it. This is referred to as a merge commit, and is special in

# that it has more than one parent.

# tracking branch

# Checking out a local branch from a remote-tracking branch automatically creates what is called a “tracking branch”.

# the branch it tracks is called an “upstream branch”

# Short SHA-1

# Git is smart enough to figure out what commit you meant to type if you provide

# the first few characters, as long as your partial SHA-1 is at least four characters

# long and unambiguous – that is, only one object in the current repository begins

# with that partial SHA-1.

    $ git show 1c002dd4b536e7479fe34593e72e6c6c1819e53b
    $ git show 1c002dd4b536e7479f
    $ git show 1c002d

# Generally, eight to ten characters are more than enough to be unique within a project.

# three 3 trees, By “tree” here we really mean “collection of files”, not specifically the data structure

# Git as a system manages and manipulates three trees in its normal operation:

    1. HEAD - Last commit snapshot, next parent
    2. Index - Proposed next commit snapshot
    3. Working Directory - sandbox

# branch references

    # you want to show the last commit object on a branch,
    # the following commands are equivalent,
    # assuming that the topic1 branch points to ca82a6d

$ git show ca82a6dff817ec66f44342007202690a93763949
$ git show topic1 # show which commit a branch points to?
$ $ git rev-parse topic1
#: ca82a6dff817ec66f44342007202690a93763949

# git rev-parse

# get the sha1 of the referenced commit

    $ git rev-parse HEAD
    $ git rev-parse HEAD^
    $ git rev-parse HEAD~2

# reflog

# log of where your HEAD and branch references have been for the last few months

    $ git reflog

# each time your branch tip is updated for any reason, git stores that info for you in this temp repo

    $ git show HEAD@{5}

# You can also use this syntax to see where a branch was some specific amount of time ago.

    $ git show master@{yesterday}
    $ git show HEAD@{2.months.ago} # only works if this branch existed 2 months ago

# Ancestry References

# If you place a ^ at the end of a reference, Git resolves it to mean the parent of that commit

# Then, you can see the previous commit by specifying HEAD^, which means “the parent of HEAD”

    $ git show HEAD^
      # The first parent is the branch you were on
      # when you merged, and the second is the commit on the branch that you
      # merged in, a # after the commit is parent of parent ...
    $ git show HEAD^2
    $ git show d921970^2

# first parent of first parent of first parent

    $ git show HEAD~3
      # also could be written as:
    $ git show HEAD^^^

# second parent of previous reference

    $ git show HEAD~3^2

# Commit Ranges

# aliases

$ git config --global alias.co checkout
$ git config --global alias.br branch
$ git config --global alias.ci commit
$ git config --global alias.st status
$ git config --global alias.unstage 'reset HEAD --'
$ git unstage fileA # same as:
$ git reset HEAD -- fileA
$ git config --global alias.last 'log -1 HEAD' # git last

# run an external command, rather than a Git subcommand. In that case, you start the command with a ! character

    $ git config --global alias.visual '!gitk'

# examples:

    $ git config alias.sdiff '!'"git diff && git submodule foreach 'git diff'"
    $ git config alias.spush 'push --recurse-submodules=on-demand'
    $ git config alias.supdate 'submodule update --remote --merge'

# merging tips

1. make sure your working directory is clean
   before doing a merge that may have conflicts. If you have work in progress, either
   commit it to a temporary branch or stash it.

# advanced merging

# When you invoke a merge into HEAD (ex. git merge topic), the new commit has

# two parents: the first one is HEAD, and the second is the tip of the branch

# being merged in.

    # if you have merge conflicts, and you want to roll back abort merge
      # The only cases where it may not be able to do this perfectly
      # would be if you had unstashed, uncommitted changes in your working directory
      # when you ran it, otherwise it should work fine.
        $ git merge --abort

# (-Xignore-all-space) ignores whitespace completely when comparing lines

    $ git merge -Xignore-all-space whitespace

# (-Xignore-space-change) treats sequences of one or more whitespace characters as equivalent

    $ git merge -Xignore-space-change whitespace

# (--merge) show the commits in either side of the merge that touch a file

    # that currently conflicted
      $ git log --oneline --left-right --merge
    # (-p, shows from non-commits) get the diffs to the file that ended up in the conflict
      $ git log --oneline --left-right -p

# run after a merge conflict, see whats still in conflicted state "combined diff"

    $ git diff
      # shows some extra columns for added benefit
        1. 1st column (+/-) if that line is different between the “ours” branch and the file in                your working directory
        2. 2nd column (+/-) if that line is different between the “theirs” branch and the file in              your working directory
        3. 1st & 2nd column (++/--) working copy but were not in either side of the merge

# See how something resolved after a merge, 2 ways

    1. git show [merge-commit]
    2. $ git log --cc -p -1

# tell git to favor ours/theirs instead of adding conflict markers

    $ git merge -Xours mundo
    $ git merge -Xtheirs mundo

# do a fake merge, do a merge, but dont even look at the branch your merging in.

    # ours merge strategy
    # could be a good choice to avoid a commit but keep everything else
      bash $ git merge maint~4
      bash $ git merge -s ours maint~3
      bash $ git merge maint
    # (-s ours) is the argument for -s
      $ git merge -s ours mundo

# manual file re-merging

# First, we get into the merge conflict state. Then we want to get copies of my

# version of the file, their version (from the branch we’re merging in) and the

# common version (from where both sides branched off). Then we want to fix up

# either their side or our side and re-try the merge again for just this single file.

    # Getting the three file versions is actually pretty easy. Git stores all of these
    # versions in the index under “stages” which each have numbers associated with
    # them. Stage 1 is the common ancestor, stage 2 is your version and stage 3 is
    # from the MERGE_HEAD, the version you’re merging in (“theirs”).

# You can extract a copy of each of these versions of the conflicted file with the

# git show command and a special syntax.

# common

    $ git show :1:hello.rb > hello.common.rb

# working (ours)

    $ git show :2:hello.rb > hello.ours.rb

# version your merging in (theirs)

    $ git show :3:hello.rb > hello.theirs.rb

# plumbing command to get hash (sha-1) on each of these files:

    $ git ls-files -u

# manually fix up the file, do something in vim to fix it

    $ vim hello.theirs.rb

# use merge-file to manually merge the file from all the file versions

    $ git merge-file -p hello.ours.rb hello.common.rb hello.theirs.rb > hello.rb

# run git diff to compare what is in your working directory that you’re about to commit as the # result of the merge to any of these stages.

    # compare your result to what you has in your branch before the merge
      $ git diff --ours
    # show how the result of the merge differed from what was on their side
      # (-b to remove whitespace)
        $ git diff --theirs -b
    # show how the file has changes from both sides
      $ git diff --bsae -b

# clean up directory of files we created earlier (hello.common...)

    $ git clean -f

# undo merge

# if it only resides on your local, and was the last commit, careful rewrites hostory

    $ git reset --hard HEAD~

# if you have pushed somewhere

    # (-m 1) flag indicates which parent is the “mainline”
    $ git revert -m 1 HEAD
      # this will make the first commit, reference the head of master
        # this will leave the merge intact except nothing pointing to it.
          # if you add work to topic and merge again, Git will only bring in the
          # changes since the reverted merge:
        # the best way to work around this, is revert the original merge, then re-merge
          $ git revert ^HASH
          $ git merge topic

# pull in project as a sub-directory

# it reads the root tree of one branch into your

# current staging area and working directory

    $ git read-tree --prefix=rack/ -u rack_branch
      $ git read-tree --prefix=[new-directory]/ -u [branch_name]
    # When we commit, it looks like we have all the Rack files under
    # that subdirectory – as though we copied them in from a tarball

# then when your sub-directory branch updates, its easy to pull in changes from upstream

    $ git checkout rack_branch
    $ git pull
    $ git checkout master
    $ git merge --squash -s recursive -Xsubtree=rack rack_branch

# compare subtree subsirectory with local/remote branch

    $ git diff-tree -p rack_branch
    $ git diff-tree -p rack_remote/master

# getting help on a command, 3 ways:

$ git help
$ git --help
$ man git-

### plumbing commands

# git cat-file

      # getting the actual directory listing:
    $ git cat-file -p HEAD

# git ls-tree

      # SHA-1 checksums for each file in the HEAD snapshot
    $ git ls-tree -r HEAD
      # whats in your index?
    $ git ls-files -s

# git rerere “reuse recorded resolution”

# set up 2 different ways

    1. $ git config --global rerere.enabled true
    2. You can also turn it on by creating the .git/rr-cache directory in a specific repository

# check rerere status

    $ git rerere status

# show rerere diff

    $ git rerere diff

# show left/right versions

    $ git ls-files -u

# resolve as usual, then add, commit, rerere will record this and do it auto next time

# show how it was automatically resolved

    $ git diff

# file annotation - git blame

# (-L [range]) option to limit the output to lines 12 through 22

    $ git blame -L 12,22 simplegit.rb
      # the output will show the hash first, and sometimes with a leading carot
      # which means that line hasnt changed since the file was created

# (-C) analyzes the file you’re annotating and tries to figure out where snippets of

# code within it originally came from if they were copied from elsewhere.

# you can see where sections of the code originally came from

    $ git blame -C -L 141,153 GITPackUpload.m

# git bisect - binary search

# does a binary search through your commit history to help you

# identify as quickly as possible which commit introduced an issue

    $ git bisect start
    $ git bisect bad
    $ git bisect good v1.0

# Git figured out that about 12 commits came between the commit you

# marked as the last good commit (v1.0) and the current bad version, and it

# checked out the middle one for you.

    # now test to see if issue exists here
      # if no issue on this commit
        $ git bisect good
      # if the issue exists here
        $ git bisect bad
    # each time you git bisect good/bad the commit changes

# reset when done, do move HEAD back to where you were before you started bisect

    $ git bisect reset

# can also be automated

    $ git bisect start HEAD v1.0
    $ git bisect run test-error.sh
      # script that will exit 0 if the
      # project is good or non-0 if the project is bad
      # Doing so automatically runs test-error.sh on each checked-out commit
        # until Git finds the first broken commit. You can also run something like make or
        # make tests or whatever you have that runs automated tests for you


# submodules

$ git submodule add https://github.com/chaconinc/DbConnector [dir=DbConnector]

# .gitmodules file gets created here

    # configuration file that stores the mapping between
    # the project’s URL and the local subdirectory you’ve pulled it into

# you can set your own url's different that the .gitmodules file

    $ git config submodule.DbConnector.url PRIVATE_URL

# use git status to see whats happening

    $ git status
      # Although DbConnector is a subdirectory in your working directory, Git sees
      # it as a submodule and doesn’t track its contents when you’re not in that directory.
      # Instead, Git sees it as a particular commit from that repository.

# diff on project folder entry from git status

    $ git diff --cached DbConnector

# diff with nicer output

    $ git diff --cached --submodule

# cloning a repo with submodules

    $ git clone [repo]
    $ git submodule init
    $ git submodule update

# another way, shorter method to do the same as above

    $ git clone --recursive https://github.com/chaconinc/MainProject

# pulling in upsteam changes to submodule

    $ cd path/to/submodule
    $ git fetch
    $ git merge origin/master

# easier way to pull in upstream changes

    $ git submodule update --remote DbConnector
      # it defaults to master, but just set it in the .gitmodules file
      # -or- in your git config, but this is not tracked in your repo
        # $ git config -f .gitmodules submodule.DbConnector.branch stable
        # $ git submodule update --remote [name=all]
    # check for changes with git status, but it wont show submodules changes until in git config
      # set the config to show submodule changes
        $ git config status.submodulesummary 1
        $ git status

# show changes in log with submodules after commited

    $ git log -p --submodule

# check for changes after merging upstream submodule

    $ git diff --submodule
      # if you dont want to type --submodule everytime on git diff
        $ git config --global diff.submodule log

# update all submodules, just dont pass a name as last argument

    $ git submodule update --remote
      # this will leave your submodule in a "detached HEAD" state
    # merge in local changes, checkout a branch in that submodule first (it was probably in detached HEAD mode)
      $ git checkout stable
      $ git submodule update --remote --merge/rebase
      $ git submodule update --remote --rebase
        # If you forget the --rebase or --merge, Git will just update the submodule
        # to whatever is on the server and reset your project to a detached HEAD state.
        # If this happens, don’t worry, you can simply go back into the directory and
        # check out your branch again (which will still contain your work) and merge or
        # rebase origin/stable (or whatever remote branch you want) manually.
    # (--recurse-submodules=check|on-demand) we need to make sure our repo is updated with submodule changes if we made any
      # this will check, and fail your push if any unpushed changes exists
        $ git push --recurse-submodules=check
      # this will push your changes
        $ git push --recurse-submodules=on-demand

# merging from detached head

    $ git branch try-merge [short-sha1-commit-hash]
      # then we need to add and commit our conflicts,
        $ git add src/main.c
        $ git commit -am 'merged our changes'
        $ cd ..
          # check our repo
        $ git diff --submodule
        $ git add [submodule name]
        $ git commit -m "Merge Tom's Changes"

# submodule foreach

    $ git submodule foreach 'git stash'
    $ git submodule foreach 'git checkout -b featureA'
    $ git diff; git submodule foreach 'git diff'

# if you create submodule on a branch, and switch to another branch it will still exist

    # if you remove it, then switch back to that branch you will need to re-initialize
      $ submodule update --init

# remove submodules

    $ git clean -fdx

# git clone

# you will have booyah/master as your default remote branch.

    $ git clone -o booyah

# clone a project with submodules

    $ git clone --recursive https://github.com/chaconinc/MainProject

# git status

$ git status

# git status short version

    $ git status -s

# Anything that has merge conflicts and hasn’t been resolved is listed as unmerged.

    Unmerged paths: - will be seen in git status output

# git status short with branch info

    $ git status -sb

# git merge-file, manually merge files

# use merge-file to manually merge the file from all the file versions

    $ git merge-file -p hello.ours.rb hello.common.rb hello.theirs.rb > hello.rb

# always use ours/theirs side to merge resolve conflicts

    $ git merge-file --ours

# git diff

# To see what you’ve changed but not yet staged, type git diff with no other arguments

    $ git diff

# To see what you’ve staged that will go into your next commit

    $ git diff --staged [aka --cached]

# put three periods after another branch to do a diff between the last commit

# of the branch you’re on and its common ancestor with another branch

    # This command shows you only the work your current topic branch has introduced
    # since its common ancestor with master.
    $ git diff master...contrib

# git difftool

# see what is available on your system

    $ git difftool --tool-help

# view any of these diffs in software like emerge, vimdiff and many more

    $ git difftool

# git add

# add parts of a file

    $ git add [-p|--patch]

# git commit

# puts the diff of your change in the editor so you can see exactly what changes you’re committing

    $ git commit -v

# One of the common undos takes place when you commit too early and possibly

# forget to add some files, or you mess up your commit message. If you want

# to try that commit again, you can run commit with the --amend option

# if you havent made any changes, you can still change your commit message with this command

    $ git commit --amend
      # example
      $ git commit -m 'initial commit'
      $ git add forgotten_file
      $ git commit --amend # editor will open with commit message from original commit

# git rm

# removes the file from your working directory and stages the changes so you don’t see it as an untracked file the next time around

    $ git rm filename

# keep the file in your working tree but remove it from your staging area

    $ git rm --cached README

# Note the backslash (\) in front of the \*. This is necessary because Git does its

# own filename expansion in addition to your shell’s filename expansion. This

# command removes all files that have the .log extension in the log/ directory

    $ git rm log/\*.log

# remove directory and folder from index and working directory

    $ git rm -r CryptoLibrary

# git mv

# equal to running these commands

# $ mv README.md README

# $ git rm README.md

# $ git add README

    $ git mv file_from file_to

# git log

# -p, which shows the difference introduced in each commit

# -2, which limits the output to only the last two entries

    $ git log -p -2

# see some abbreviated stats for each commit

    # As you can see, the --stat option prints below each commit entry a list of
    # modified files, how many files were changed, and how many lines in those files
    # were added and removed. It also puts a summary of the information at the end.
      $ git log --stat

# oneline, short, full, and fuller options show the output in roughly the same format but with less or more information,

    $ git log --pretty=oneline

# allows you to specify your own log output format

    $ git log --pretty=format:"%h - %an, %ar : %s"

# adds a nice little ASCII graph showing your branch and merge history

    $ git log --pretty=format:"%h %s" --graph

# limiting log output

    $ git log --since=2.weeks

# filter, if you wanted to find the last commit that added or removed a reference to a specific function, you could call

    $ git log -Sfunction_name

# git log filter path

# If you specify a directory or file name, you can limit the log output to commits that introduced a change to those files.

    $ git log --path path/to/file

# show which commits modifying test files in the Git

# source code history are merged and were committed by Junio Hamano in the

# month of October 2008

    $ git log --pretty="%h - %s" --author=gitster --since="2008-10-01" \

# show you where the branch pointers are pointing

    $ git log --oneline --decorate

# print out the history of your commits,

# showing where your branch pointers are and how your history has diverged

    $ git log --oneline --decorate --graph --all

# log filter that asks Git to only

# show the list of commits that are on the latter branch (in this case origin/

# master) that are not on the first branch (in this case issue54).

    $ git log --no-merges issue54..origin/master
    $ git log featureA..origin/featureA

# Show last entry, in pretty fuller mode

    $ git log --pretty=fuller -1

# exclude commits in the master branch by adding the --not option before the branch name

    $ git log contrib --not master

# show the diff for each commit (-p)

    $ git log -p

# show short abbreviations for commit sha-1

    $ git log --abbrev-commit --pretty=oneline

# show reflog info formatted like git log

    $ git log -g

# show all commits reachable by experiment that are not reachable by master

    $ git log master..experiment

# show all commits in master not reachable by experiment

    $ git log experiment..master

# show what your about to push to a remote

    $ git log origin/master..HEAD

# show commits in refB that are not in refA, you can use the --not, ^ or .. syntax, these commands are equal

      $ git log refA..refB
      $ git log ^refA refB
      $ git log refB --not refA
    # works on 3 or more branches too:
      $ git log refA refB ^refC
      $ git log refA refB --not refC

# triple dot, specify all commits that are reachable by either branch, but not both together

      $ git log master...experiment

# shows you which side of the range each commit is in

    $ git log --left-right master...experiment
      #: < D
      #: < E
      #: > F
      #: > G

# show signatures verify GPG

    $ git log --show-signature -1
    $ git log --pretty="format:%h %G? %aN %s"

# show log without pager --no-pager

    $ git --no-pager log --oneline -20 --graph
      # also can use the GIT_PAGER env variable
        $ GIT_PAGER="cut -c 1-${COLUMNS-80}" git --no-pager log --decorate=short --pretty=oneline -n1

# (-S) search commits by the contents of the commit message or even the diff they introduce

    # tell Git to only show us the commits that either added or removed that string (below, ZLIB_BUF_MAX) with the -S option
    # If you need to be more specific, you can provide a regular expression to search for with the -G option.
      $ git log -SZLIB_BUF_MAX --oneline

# (-L) show us every change made to the function as a series of patches back to when the function was first created

    # we wanted to see every change made to the function git_deflate_bound in the zlib.c file
      $ git log -L :git_deflate_bound:zlib.c
    # can also pass it a regex as an alternative
      $ git log -L '/unsigned long git_deflate_bound/',/^}/:zlib.c
    # You could also give it a range of lines or a single line number and you’ll get the same sort of output

# show all commits in a nice tidy graph with one line each

    $ git log --graph --oneline --decorate --all

# get a full list of the unique commits that were included

# in either branch involved in this merge, use the "triple dot" syntax

    $ git log --oneline --left-right HEAD...MERGE_HEAD

# (--merge) show the commits in either side of the merge that touch a file

# that currently conflicted

    $ git log --oneline --left-right --merge

# (-p) get the diffs to the file that ended up in the conflict

    $ git log --oneline --left-right -p

# see how merge conflict resolved after the merge resolved, -1 cause its the last commit

    $ git log --cc -p -1

# show log with submodules

    $ git log -p --submodule

# get commits on master that are not on origin/master

    $ git log --oneline master ^origin/master
    $ git log --oneline origin/master..master

# log commits from a branch

    $ git log --oneline master

# use HEAD~^ syntax to get all commits up to a new HEAD(^~)

    $ git log HEAD~2
      # logs all commits up to HEAD~2 as the last one

git ls-files
git rm --cached -r .
git rm --cached [filename]
git check-ignore [filepath] -v
find . -name .DS_Store -print0 | xargs -0 git rm --ignore-unmatch

# git reset, remove from staging area

$ git reset filename.txt
$ git reset HEAD CONTRIBUTING.md # partially resetting files
$ git reset --patch

# these below will rewrite history, only do if not pushed to remote yet

      # reset the commit hash to staged
    $ git reset --soft [commit]
      # reset the commit hash to working directory
    $ git reset --mixed [commit]
      # reset the commit hash and erase all working files that are not new
    $ git reset --hard [commit]
      # if you then wanted to delete those new files
        $ git clean -df

# reset to a path

      # move the head pointer back to a pervious commit
      # this works cause it wont reset the working directory, but it does re-write history
    $ git reset --soft HEAD~2
      # this will take the HEAD pointer, and go back 2 commits. The index/working directory will remain on the older HEAD content.
      # after you commit, you will skip all of the commits until the old head

# reset the path to working directory, use the commit=HEAD to pull that version of the file

    $ git reset --mixed [sha=HEAD] [branch=current] [path]
    $ git reset --mixed HEAD path/to/file
    $ git reset eb43bf file.txt
      # you can use a -- to separate the branch/commit argument from the path
        $ git reset eb43 -- file.txt

# reset to branch

    $ git reset master
      # moves the branch your  on to the same commit that master points to
      # reset will move the branch HEAD points to, checkout moves HEAD itself.

# git stash, will only store files that are already in the index, unless you set --include-untracked

    # stashing parts of files

$ git stash push [-p|--patch] [-k|--[no-]keep-index] [-u|--include-untracked] [-m|--message ] [--] […​]] # stash your files
$ git stash -or- git stash push # add a --message # A stash is by default listed as "WIP on branchname …​", but you can give a more descriptive message on the command line when you create one.
$ git stash push --message "my message here" # -p | --patch flag, Git will not stash everything that is # modified but will instead prompt you interactively which of the changes you # would like to stash and which you would like to keep in your working directory. # The --patch option implies --keep-index. You can use --no-keep-index to override this.
$ git stash push --patch # pass a path spec, relative to the repository root (top)
$ git stash -p -- subdir/AB.Dir1/Dir2/DestinationHierarchyCreator.cs # Git will also stash any untracked files you have created
$ git stash --include-untracked # tells Git to not stash anything that you’ve already staged with the git add
$ git stash --keep-index # show your stash stack
$ git stash list # apply last stash to branch currently on
$ git stash apply # apply a other stash besides that last one
$ git stash apply stash@{2} # re-apply the staged changes
$ git stash apply --index # apply does not remove your stash from your list, drop your stash after done
$ git stash drop stash@{0} # apply the stash and then immediately drop it from your stack
$ git stash pop [stash@{0}] # create a branch from a stash # creates a new branch for you, checks out the commit you were on when you stashed your # work, reapplies your work there, and then drops the stash if it applies successfully
$ git stash branch # Remove all the stash entries
$ git stash clear # remove everything but save it in a stash
$ git stash --all

# git clean

    # delete all changes in current working branch/directory instead of saving it
    # which removes any files and also
    # any subdirectories that become empty as a result. The -f means force or “really do this”.

$ git clean
$ git clean -f -d # -f flag to force # If you ever want to see what it would do, you can run the command with the # -n option, which means “do a dry run and tell me what you would have removed”.
$ git clean -f -d -n # also an interactive for clean (-i) flag
$ git clean -x -i # also, remove files that your gitignore would have ignored (-x) flag
$ git clean -n -d -x

# git checkout

# revert it back to what it looked like when you last committed

    $ git checkout -- CONTRIBUTING.md

# checking out parts of files

    $ git checkout --patch CONTRIBUTING.md

# running git checkout branch is almost like running git reset --hard branch

    $ git checkout branch
      # 1. it will check to make sure it’s not blowing away files that have changes to them
      # 2. Where reset will move the branch that HEAD points to, checkout will move HEAD itself to point
        # to another branch

# running git checkout with a path

    $ git checkout path/to/file
      # alot like, git reset --hard [branch] file
      # it’s not working-directory safe, and it does not move HEAD.

# git checkout with commit hash

    $ git checkout hash
      # changes to detached head mode

# reset the conflict markers, showing a different syntax

    # if you want to set the config to this, but default is merge:
      $ git config --global merge.conflictstyle diff3
    # ours, theirs and base
      $ git checkout --conflict=diff3 hello.rb
    # default markers <<<<< >>>>
      $ git checkout --conflict=merge hello.rb

# use git checkout to resolve merge conflicts

    $ git checkout --ours [file.path]
    $ git checkout --theirs [file.path]

# recreate conflicted state with checkout (--conflict=merge)

    $ git checkout --conflict=merge hello.rb

# git remote

# show remote names one per line

    $ git remote

# show remotes name and url one per line

    $ git remote -v

# Inspecting a Remote

    git remote show origin
    git remote rename pb paul
    git remote remove paul
    $ git remote add pb https://github.com/paulboone/ticgit
    git remote add upstream git@github.com:thoughtbot/dotfiles.git
    git ls-remote

#show branchs on remote
git remote -r

# The --heads option lists only branch names since the command can list tags too

    git ls-remote [remote]
    git ls-remote --heads origin

# remove and rename remotes

    $ git remote rename pb paul
    $ git remote rm paul

# (-f) fetch after remote setup

    $ git remote add -f tpope-vim-surround https://bitbucket.org/vim-plugins-mirror/vim-surround.git

# set new remote url

    $ git remote set-url remote_name new/url

# git tag

# This command lists the tags in alphabetical order; the order in which they appear has no real importance.

    $ git tag

# search for a tag, If you’re only interested in looking at the 1.8.5 series, you can run this:

    $ git tag -l "v1.8.5*"

# Annotated Tags

    # Annotated tags, however, are stored as full objects in the Git database.
    # They’re checksummed; contain the tagger name, email, and date; have a tagging
    # message; and can be signed and verified with GNU Privacy Guard (GPG).
      $ git tag -a v1.4 -m "my version 1.4"

# show tag

    $ git show v1.4

# lightweight tags

    # This is basically the commit checksum stored in a file – no other information is kept.
      $ git tag v1.4-lw
        # when you run $ git show v1.4-lw, you don’t see the extra tag information

# tag later on after the commit

    $ git tag -a v1.2 9fceb02

# push tag to remote

    $ git push origin v1.5

# push all tags to remote, This will transfer all of your tags to the remote server that are not already there

    $ git push origin --tags

# create a new branch at a specific tag

    $ git checkout -b version2 v2.0.0

# cut a release

    # sign the tag as the maintainer
      $ git tag -s v1.5 -m 'my signed 1.5 tag'
        # If you do sign your tags, you may have the problem of distributing the public
        # PGP key used to sign your tags. The maintainer of the Git project has solved this
        # issue by including their public key as a blob in the repository and then adding a
        # tag that points directly to that content. To do this, you can figure out which key
        # you want by running
          $ gpg --list-keys
          $ gpg -a --export F721C45A | git hash-object -w --stdin
            #: 659ef797d181633c87ec71ac3f9ba29fe5775b92
            # Now that you have the contents of your key in Git, you can create a tag that
            # points directly to it by specifying the new SHA-1 value that the hash-object
            # command gave you:
              $ git tag -a maintainer-pgp-pub 659ef797d181633c87ec71ac3f9ba29fe5775b92
            # If anyone wants to verify a tag, they can directly import your
            # PGP key by pulling the blob directly out of the database and importing it into
            # GPG:
              $ git show maintainer-pgp-pub | gpg --import

# verify a signed tag, You need the signer’s public key in your keyring for

# this to work properly:

    $ git tag -v v1.4.2.1

# show GPG signature attached to tag

    $ git show v1.5

# signing your work

$ gpg --list-keys # If you don’t have a key installed, you can generate one with gpg --genkey.
$ gpg --gen-key # Once you have a private key to sign with, you can configure Git to use it for # signing things by setting the user.signingkey config setting.
$ git config --global user.signingkey 0A46826A # Now Git will use your key by default to sign tags and commits if you want. # If you have a GPG private key setup, you can now use it to sign new tags. All you # have to do is use -s instead of -a:
$ git tag -s v1.5 -m 'my signed 1.5 tag' # show the tag to see GPG attached
$ git show v1.5 # verify the signed tag
$ git tag -v v1.4.2.1 # show and verify signatures with git log
$ git log --show-signature -1

# git describe

    # git describe command favors annotated tags

# if you want to have a human-readable

# name to go with a commit, you can run git describe on that commit. Git

# gives you the name of the nearest tag with the number of commits on top of

# that tag and a partial SHA-1 value of the commit you’re describing

    $ git describe master
    #: v1.6.2-rc1-20-g8c5b85c

# prepare a release, tar or zip

$ git archive master --prefix='project/' | gzip > `git describe master`.tar.gz
$ git archive master --prefix='project/' --format=zip > `git describe master`.zip

# shortlog, It summarizes all the commits in the range you give it

$ git shortlog --no-merges master --not v1.0.1 # gives you a summary of all the commits since your last release # You get a clean summary of all the commits since v1.0.1, grouped by author, # that you can email to your list.

# git fetch

# Goes out to that remote project and pulls down all the data from that remote project that you don’t have yet

# moving your origin/master pointer to its new, more up-to-date position

# you don’t have a new serverfix branch – you only have an origin/serverfix pointer that you can’t modify

$ git fetch [remote-name]
$ git fetch origin # contains serverfix branch in example

# git push

$ git push origin serverfix
$ git push origin refs/heads/serverfix:refs/heads/serverfix
$ push origin serverfix:serverfix # refspec, specifying the local branch followed by a colon (:) followed by the remote branch
$ git push -u origin featureB:featureBee

# push history branch to project-history repo/master

$ git push project-history history:master

# fetch all remotes?

    $ git fetch --all

# delete remote branch?

    # Basically all this does is remove the pointer from the server
    $ git push origin --delete serverfix

# rebase on top of origin/master in order to ff to fork

    $ git checkout featureA
    $ git rebase origin/master
    $ git push -f myfork featureA

# push branch with tags

    $ git push [remote] [branch] --follow-tags

# test your push

    $ git push [remote] [branch] --dry-run

# remove remote branches that dont have a local counterpart

    # would make sure that remote refs/tmp/foo will be removed if refs/heads/foo doesn’t exist.
      $ git push --prune remote refs/heads/*:refs/tmp/*

# create a base commit at the parent of 9c68fdc

$ echo 'get history from blah blah blah' | git commit-tree 9c68fdc^{tree}

# git pull [remote] [branch]

$ git fetch origin
$ git merge [branch]

# does a one-time pull and doesn’t save the URL as a remote reference

    $ git pull https://github.com/onetimeguy/project

# inspect and reject when merging a commit that does not carry a trusted GPG signature

    $ git pull --verify-signatures non-verify

# git request-pull, email the output to the project maintainer manually

# takes the base branch into which you want

# your topic branch pulled and the

# Git repository URL you want them to pull from

    $ git request-pull origin/master myfork

# git format-patch

# generate the mbox-formatted files that you can email to

# the list – it turns each commit into an email message with the first line of the

# commit message as the subject and the rest of the message plus the patch that

# the commit introduces as the body. The nice thing about this is that applying a

# patch from an email generated with format-patch preserves all the commit

# information properly.

    # The format-patch command prints out the names of the patch files it creates.
    # The -M switch tells Git to look for renames
      $ git format-patch -M origin/master

# git rebase

### Do not rebase commits that exist outside your repository.

    # rebasing makes for a cleaner history. If you examine
    # the log of a rebased branch, it looks like a linear history: it appears that all the
    # work happened in series, even when it originally happened in parallel.

# Often, you’ll do this to make sure your commits apply cleanly on a remote

# branch – perhaps in a project to which you’re trying to contribute but that you

# don’t maintain. In this case, you’d do your work in a branch and then rebase

# your work onto origin/master when you were ready to submit your patches

# to the main project. That way, the maintainer doesn’t have to do any integration

# work – just a fast-forward or a clean apply.

# With the rebase command, you can take all the changes that were committed

# on one branch and replay them on another one.

    $ git checkout experiment
    $ git rebase master
    : First, rewinding head to replay your work on top of it...
    : Applying: added staged command

# after that, you can go back to master and do a fast-forward merge

    $ git checkout master
    $ git merge experiment

# Rebasing replays changes from one line of work onto another in the order

# they were introduced, whereas merging takes the endpoints and merges them

# together.

# Check out the client branch, figure out the patches from

# the common ancestor of the client and server branches, and then replay

# them onto master

    $ git rebase --onto master server client

# then do a ff merge on master

    $ git checkout master
    $ git merge client --ff-only

# later you want to pull in your server branch as well?

    # You can rebase the
    # server branch onto the master branch without having to check it out first by
    # running git rebase [basebranch] [topicbranch] – which checks out the
    # topic branch (in this case, server) for you and replays it onto the base branch
    # (master):
      $ git rebase master server
        # then ff your master
          $ git checkout master
          $ git merge server --ff-only
        # then delete your topic branches
          $ git branch -d client
          $ git branch -d server

# changing commit messages with rebase, or reordering them

# every commit included in the range HEAD~3..HEAD will be rewritten,

# whether you change the message or not

    # change the last three commit messages, 2 ways to do it below:
      $ git rebase -i HEAD~3
      $ git rebase -i HEAD~2^
    # Running this command gives you a list of commits in your text editor
      # You need to edit the script so that it stops at the commit you want to edit. To
      # do so, change the word ‘pick’ to the word ‘reword’ for each of the commits you
      # want the script to stop after
      # if you just want to reorder them, or delete them, it will work too
        # Git rewinds your branch to the parent of these commits, applies each one separately, and then stops
    # When you save and exit the editor, Git rewinds you back to the last commit
    # in that list and drops you on the command line:
      # then run, for each one you want to change.
        $ git commit --amend
        $ git rebase --continue
      # If you change pick to edit on more lines, you can repeat these
      # steps for each commit you change to edit. Each time, Git will stop, let you
      # amend the commit, and continue when you’re finished.

# squashing commits

# It’s also possible to take a series of commits and squash them down into a single

# commit with the interactive rebasing tool.

      $ git rebase -i HEAD~3
      $ git rebase -i HEAD~2^
    # Running this command gives you a list of commits in your text editor
      # You need to edit the script so that it stops at the commit you want to edit. To
      # do so, change the word ‘pick’ to the word ‘squash’ for each of the commits you
      # want to squash together
      # Git applies both that change and the change directly before it and makes
      # you merge the commit messages together
    # When you save and exit the editor, Git applies all three changes and then
    # puts you back into the editor to merge the commit messages.
      # When you save that, you have a single commit that introduces the changes
      # of all three previous commits.

# spliting a commit

# It’s also possible to take a series of commits and split them down into multiple

# commits with the interactive rebasing tool.

      $ git rebase -i HEAD~3
      $ git rebase -i HEAD~2^
    # Running this command gives you a list of commits in your text editor
      # You need to edit the script so that it stops at the commit you want to edit. To
      # do so, change the word ‘pick’ to the word ‘edit’ for each of the commits you
      # want to split
    # Then, when the script drops you to the command line, you reset that commit,
    # take the changes that have been reset, and create multiple commits out of them
      # When you save and exit the editor, Git rewinds to the parent of the first
      # commit in your list, applies the first commit (f7f3f6d), applies the second
      # (310154e), and drops you to the console.
    # There, you can do a mixed reset of
    # that commit with git reset HEAD^, which effectively undoes that commit
    # and leaves the modified files unstaged. Now you can stage and commit files until
    # you have several commits, and run git rebase --continue when you’re done
      $ git reset HEAD^
      $ git add README
      $ git commit -m 'updated README formatting'
      $ git add lib/simplegit.rb
      $ git commit -m 'added blame'
      $ git rebase --continue
    # afterwards check your log
      $ git --no-pager log -4 --pretty=format:"%h %s"


# REMOVING A FILE FROM EVERY COMMIT

# git fliter-branch, nuclear option

# (--tree-filter) To remove a file named passwords.txt

# from your entire history, you can use the --tree-filter option to filterbranch

    $ git filter-branch --tree-filter 'rm -f passwords.txt' HEAD
    #: Rewrite 6b9b3cf04e7c5686a9cb838c3f36a8cb6a0fc2bd (21/21)
    #: Ref 'refs/heads/master' was rewritten
      # The --tree-filter option runs the specified command after each checkout
      # of the project and then recommits the results. In this case, you remove a file
      # called passwords.txt from every snapshot, whether it exists or not

# remove all accidentaly committed editor swap backup files

    $ git filter-branch --tree-filter 'rm -f *~' HEAD

# make a new directory the project root directory

    $ git filter-branch --subdirectory-filter new_directory HEAD
      # Now your new project root is what was in the trunk subdirectory each time.
      # Git will also automatically remove commits that did not affect the subdirectory.

# (--commit-filter) change your email address in all your commits

    $ git filter-branch --commit-filter '
        if [ "$GIT_AUTHOR_EMAIL" = "schacon@localhost" ];
        then
          GIT_AUTHOR_NAME="Scott Chacon";
          GIT_AUTHOR_EMAIL="schacon@example.com";
          git commit-tree "$@";
        else
          git commit-tree "$@";
        fi' HEAD
         # This goes through and rewrites every commit to have your new address. Because
         # commits contain the SHA-1 values of their parents, this command
         # changes every commit SHA-1 in your history, not just those that have the
         # matching email address.

# (--all) to run filter-branch on all your branches, you can pass --all to the command.

# (--onto) rebase onto a particular commit (622e88) to the point of the parent of the commit you want to keep.

    # first get a good base for onto.
      $ $ echo 'get history from blah blah blah' | git commit-tree 9c68fdc^{tree}
        #: 622e88
    # then rebase onto command
      $ git rebase --onto 622e88 9c68fdc


# git replace, replace commit hash with another commit

$ git replace 81a708d c6e1e95

# git cat-file, show file and unecrpt it with this

$ git cat-file -p 81a708d

# show info about each ref that matches pattern and show them in the given format

$ git for-each-ref [--format=]

# git sub-tree

$ git remote add -f tpope-vim-surround https://bitbucket.org/vim-plugins-mirror/vim-surround.git
$ git subtree add --prefix .vim/bundle/tpope-vim-surround tpope-vim-surround master --squash
$ git subtree pull --prefix .vim/bundle/tpope-vim-surround tpope-vim-surround master --squash

# contribute back upstream

    $ git remote add durdn-vim-surround ssh://git@bitbucket.org/durdn/vim-surround.git
    $ git subtree push --prefix=.vim/bundle/tpope-vim-surround/ durdn-vim-surround master
      # After this we’re ready and we can open a pull-request to the maintainer of the package.


# without using sub-tree?

      $ git remote add -f tpope-vim-surround https://bitbucket.org/vim-plugins-mirror/vim-surround.git
    # Before reading the contents of the dependency into the repository,
    # it’s important to record a merge so that we can track the entire
    # tree history of the plug-in up to this point:
      $ git merge -s ours --no-commit tpope-vim-surround/master
    # read the content of the latest tree-object into the plugin
    # repository into our working directory ready to be committed
      $ git read-tree --prefix=.vim/bundle/tpope-vim-surround/ -u tpope-vim-surround/master
    # Now we can commit (and it will be a merge commit that
    # will preserve the history of the tree we read)
      $ git ci -m"[subtree] adding tpope-vim-surround"
    # update the project we can now pull using the git subtree merge strategy
      $ git pull -s subtree tpope-vim-surround master


# git merge

# The --squash option takes all the work on the merged branch and squashes

# it into one changeset producing the repository state as if a real merge happened,

# without actually making a merge commit. This means your future commit

# will have one parent only and allows you to introduce all the changes from

# another branch and then make more changes before recording the new commit.

    $ git merge --squash featureB
      # example:
        $ git checkout -b featureBv2 origin/master
        $ git merge --squash featureB
        # (change implementation)
        $ git commit
        $ git push myfork featureBv2

# --no-commit, can be useful to delay the merge commit in case of the default merge process.

    $ git merge --no-commit featureB

# inspect and reject when merging a commit that does not carry a trusted GPG signature

    $ git merge --verify-signatures non-verify-branch
    $ git merge --verify-signatures signed-branch

# use -S option to sign the resulting merge

    $ git merge --verify-signatures -S signed-branch

# cherry-pick in Git is like a rebase for a single commit

# It takes

# the patch that was introduced in a commit and tries to reapply it on the branch

# you’re currently on. This is useful if you have a number of commits on a topic

# branch and you want to integrate only one of them, or if you only have one

# commit on a topic branch and you’d prefer to cherry-pick it rather than run rebase

    $ git cherry-pick e43a6
      # This pulls the same change introduced in e43a6, but you get a new commit
      # SHA-1 value, because the date applied is different

# git merge-base

# want to see are the changes added to the topic branch – the

# work you’ll introduce if you merge this branch with master. You do that by having

# Git compare the last commit on your topic branch with the first common

# ancestor it has with the master branch.

1. $ git merge-base contrib master
   #: 36c7dba2c95e6bbb78dfa822519ecfec6e1ca649
2. $ git diff 36c7db


    # or shorthand
      $ git diff master...contrib

# git branch

# when ever you "$ git branch testing" - This creates a new pointer to the same commit you’re currently on.

    # shows you where the branch pointers are pointing
    $ git log --oneline --decorate

# To switch to an existing branch, you run the git checkout command.

# This moves HEAD to point to the testing branch.

    $ git checkout testing

# see which branches are already merged into the branch you’re on

    $ git branch --merged

# see all the branches that contain work you haven’t yet merged in

    $ git branch --no-merged

# see the last commit on each branch

    $ git branch -v

# delete branch

    # will fail if not merged in somewhere
      $ git branch -d [branch-name]
    # will force the branch deleted, even if not merged
      $ git branch -D [branch-name]

# create and branch off a particular commit

    $ git branch [tmp-branch-name]
    $ git checkout [tmp-branch-name]

# merge detached head

    $ git branch try-merge [short-sha1-commit-hash]

# create a branch with all commit ansectors of commit

    $ git branch history c6e1e95

# workflow

# branch names

    # stable
      master - stable branch
    # bleeding-edge
      develop/next - do work from or use to test stability
    # topic branch
      # short-lived branch that you create and use for a single particular feature or related work
    # pu = proposed updates
    # maint = maintenence backports

# git checkout

# short hand for:

    # $ git branch iss53
    # $ git checkout iss53

$ git checkout -b iss53 # $ git checkout [-b] {new_branch_name} [under_branch=HEAD_branch] # $ git checkout [--track | --no-track] [-l] [-f|--force] [=HEAD]

# when you switch branches, Git resets your working directory to look like it did the last time you committed on that branch.

    $ git checkout master

# If you want your own serverfix branch that you can work on, you can base it off your remote-tracking branch:

    $ git checkout -b serverfix origin/serverfix
    # shorthand for same as above
      # Branch serverfix set up to track remote branch serverfix from origin.
      # Switched to a new branch 'serverfix'
      $ git checkout --track origin/serverfix
        # shorthand for that shorthand? yes.
          # If the branch name you’re trying to checkout (a) doesn’t exist and (b) exactly matches
          # a name on only one remote, Git will create a tracking branch for you:
          $ git checkout serverfix
    # setup a local branch with a different name than the remote
      # Branch sf set up to track remote branch serverfix from origin.
        $ git checkout -b sf origin/serverfix
    # set local branch to remote branch after local branch already exists
      $ git branch -u[--set-upstream-to] origin/serverfix

# show tracking branches setup already

    $ git branch -vv

# rename branch

    $ git branch -m branch1 newbranchname
    # force rename is newbranchname exists already
      $ git branch -M branch1 newbranchname

# copy branch

    $ git branch -c branch1 newbranchname
    # force rename is newbranchname exists already
      $ git branch -C branch1 newbranchname

# list branches merged

    $ git branch --merged

# list branches not merged

    $ git branch --no-merged

# show remote tracking branches that matches any of the patterns given

    $ git branch --list -r [...]

# show all branches remote and local that matches any of the patterns given

    $ git branch --list -a [...]

# show only branches that contain the named commit

    $ git branch --list -[ra] [--contains [=HEAD]] [--no-contains []] [--[no-]-merged]

# delete remote tracking branch

    $ git branch -rd origin/branchname

# force a checkout, but will lose any uncommitted changes on branch your switch FROM

    $ git checkout -f master

# reload branch from index

    $ git checkout .

# specifying commit ranges

# commits reachable from ^9a466c5 (anscestors of)

    $ git bundle create commits.bundle master ^9a466c5

# commits in master that are not in origin/master

    $ git log --oneline master ^origin/master
    $ git log --oneline origin/master..master

# upstream

# When you have a tracking branch set up, you can reference its upstream

# branch with the @{upstream} or @{u} shorthand

# git bundle

# create bundle named repo.bundle, of master

    $ git bundle create repo.bundle HEAD master
      # Now you have a file named repo.bundle that has all the data needed to recreate
      # the repository’s master branch.
      # you need to list out every reference or a specific range of commits.
    $ git clone repo.bundle repo

# get commit range into bundle

    $ git bundle create commits.bundle master ^9a466c5

# verify bundle

    # check file is actually a valid Git bundle and that you
    # have all the necessary ancestors to reconstitute it properly
      $ git bundle verify ../commits.bundle

# list branches in the bundle

    $ git bundle list-heads ../commits.bundle

# import commits from the bundle

    # Here we’ll fetch the master branch of the bundle to a
    # branch named other-master in our repository
    $ git fetch ../commits.bundle master:other-master

# git show

$ git --no-pager show --oneline --no-patch HEAD~
$ git show --oneline HEAD

# In conflicted state, three show commands emerge:

    # common ansector
      $ git show :1:hello.rb
    # my version
      $ git show :2:hello.rb
    # their version
      $ git show :3:hello.rb

# git grep, search working directory

# git grep [--flags] [tag|path]

    # (-n) tell git to print line #'s where Git has found matches

$ git grep -n gmtime_r # (--count) tell git to summarize output by just showing each file path and how many matches in each file
$ git grep --count gmtime_r # (-p) see what method/function it thinks it has found a match in
$ git grep -p gmtime_r \*.c # (--and) complex combinations of strings makes sure multiple matches are on the same line
$ git grep --break --heading -n -e '#define' --and \( -e LINK -e BUF_MAX \) v1.8.0

#show all branches local/remote
git branch -a
#show only local
git branch

# get name for current branch

$(git rev-parse --abbrev-ref HEAD)

# remote current branch is pointing to

$(git config branch.$curr_branch.remote)

# will print (the last cached value of) the number of commits behind (left) and ahead (right) of your current working branch, relative to the (if any) currently tracking remote branch for this local branch.

# It will print an error message otherwise:

git rev-list --count --left-right "@{upstream}"...HEAD

#show commits with tag
git log --no-walk --tags --pretty="%h %d %s" --decorate=full

# By default, when you checkout a new branch, and you are using a remote branch as the starting point, the upstream tracking branch will be setup automatically.

git checkout -b dev origin/dev
-or-
git checkout dev

# If the starting point is a local branch, you can force the tracking by specifying the –track option:

git checkout --track -b dev master
git checkout -b /

# Branch serverfix set up to track remote branch serverfix from origin.

git checkout --track origin/serverfix

# Branch sf set up to track remote branch serverfix from origin.

git checkout -b sf origin/serverfix

# If you already created the branch, you can update only the tracking info:

git branch --set-upstream-to[-u] master dev
git branch -u master
git branch -u origin/master

# Finally, you can configure Git so they are always created, even if you don’t specify the –track option:

git config --global branch.autosetupmerge always

# delete branch

git branch -d issue1

# delete remote branch after push

git push origin --delete serverfix

# rename branch

git branch -m oldName newName

git branch -vv
git fetch –tags upstream
$ git checkout

# Create a new feature branch of development from the tip of parent:

$ git checkout -b feature/foo origin/
$ git merge / git rebase
$ git rebase upstream/master

# no-ff merge

git merge --no-ff release-1.2

# rebase

git rebase master
git mergetool
git rebase --continue
git rebase --abort
git push -f

# By specifying HEAD~3 as the new base, you’re not actually moving the branch—you’re just interactively re-writing the 3 commits that follow it.

git rebase -i HEAD~3

# This will open a text editor listing all of the commits that are about to be moved

git rebase -i master

# merge

# Then "git merge topic" will replay the changes made on the topic branch since it diverged from master (i.e., E) until its current commit (C) on top of master,

# and record the result in a new commit along with the names of the two parent commits and a log message from the user describing the changes.

git merge topic
git merge --continue
git merge --abort

# Merge branches fixes and enhancements on top of the current branch, making an octopus merge

git merge fixes enhancements

# Merge branch obsolete into the current branch, using ours merge strategy:

git merge -s ours obsolete

# Merge branch maint into the current branch, but do not make a new commit automatically:

git merge --no-commit maint

# this is same as

# git checkout feature

# git merge master

git merge master feature

# The following returns the commit ID of the original base, which you can then pass to git rebase

git merge-base feature master

# If you’re not entirely comfortable with git rebase, you can always perform the rebase in a temporary branch.

# That way, if you accidentally mess up your feature’s history, you can check out the original branch and try again.

# For example:

git checkout feature
git checkout -b temporary-branch
git rebase -i master

# [Clean up the history]

git checkout master
git merge temporary-branch

# git fast forward?

? A fast-forward is when, instead of constructing a merge commit, git just moves your branch pointer to point at the incoming commit. This commonly occurs when doing a git pull without any local changes.

# pass the --no-ff flag and git merge will always construct a merge instead of fast-forwarding.

git merge --no-ff

# execute a git pull or use git merge in order to explicitly fast-forward, and you want to bail out if it can't fast-forward, then you can use the --ff-only flag

git merge --ff-only

# reset to head

git reset HEAD shop/mickey/index.php

# mergetool?

git mergetool

master{@upstream}

# However, ‘origin/master’ is already configured as the upstream tracking branch of ‘master’, so you can do:

git rebase master@{upstream}

# Maybe you think @{upstream} is too much to type, so you can do @{u} instead, and since we are already on ‘master’ we can do HEAD@{u}, or even simpler:

git rebase @{u}

# But Git is smarter than that, by default both ‘git merge’ and ‘git rebase’ will use the upstream tracking branch, so:

git rebase

git fetch upstream
git rebase upstream/master

#This command will checkout the specified tag into a new branch. Make all the necessary changes, but make sure you are working in the newly created production branch and not in the master!
git checkout -b

git checkout --track origin/dev

# Branch dev set up to track remote branch dev from origin.

# Switched to a new branch 'dev'

#Let's now look at the opposite scenario: you started a new local branch and now want to publish it on the remote for the first time:
git push -u origin dev

#In cases when you simply forgot, you can set (or change) a tracking relationship for your current HEAD branch at any time:
git branch -u origin/dev

git ls-files
git ls-files --error-unmatch // will exit with 1 if file is not tracked

// check to see if there is anything to commit
[[-z $(git status -uno --porcelain)]] && echo "this branch is clean, no need to push..."

#get git branch
$ \_\_git_ps1 '%s'

// git stash changes apply to new branch?
git stash
git checkout -b xxx
git stash pop

//On git version 2.8.1: following works for me.
//To save modified and untracked files in stash without a name

# git stash save -u

//To save modified and untracked files in stash with a name

# git stash save -u

//You can use either pop and apply later as follows.

# git stash pop

# git stash apply stash@{0}

// fix old commits
git add
git commit --fixup=OLDCOMMIT
git commit --amend
git rebase --interactive --autosquash OLDCOMMIT^

https://stackoverflow.com/questions/1459150/how-to-undo-git-commit-amend-done-instead-of-git-commit

# Move the current head so that it's pointing at the old commit

# Leave the index intact for redoing the commit.

# HEAD@{1} gives you "the commit that HEAD pointed at before

# it was moved to where it currently points at". Note that this is

# different from HEAD~1, which gives you "the commit that is the

# parent node of the commit that HEAD is currently pointing to."

git reset --soft HEAD@{1}

# commit the current tree using the commit details of the previous

# HEAD commit. (Note that HEAD@{1} is pointing somewhere different from the

# previous command. It's now pointing at the erroneously amended commit.)

git commit -C HEAD@{1}

# look at heads

git reflog

// global ignore
// https://stackoverflow.com/questions/7335420/global-git-ignore/22885996#22885996
~/.config/git/ignore
// set global ignore

# git config --global core.excludesfile '~/.config/git/ignore'

// check global ignore

# git config --get core.excludesfile

// https://stackoverflow.com/questions/466764/git-command-to-show-which-specific-files-are-ignored-by-gitignore
// check ignore file
git status --ignored
// check ignore file
git check-ignore -v \*_/_

git diff HEAD
git diff --cached my_file.txt

# undo commit?

# https://stackoverflow.com/questions/927358/how-to-undo-the-most-recent-commits-in-git#answer-6376039

git log
commit 101: bad commit # latest commit, this would be called 'HEAD'
commit 100: good commit # second to last commit, this is the one we want
git reset --soft HEAD^ # use --soft if you want to keep your changes
git reset --hard HEAD^ # use --hard if you don't care about keeping the changes you made

global .gitignore

# git push origin --force

# `pwd` is inside a git-controlled repository

git rev-parse --is-inside-work-tree

# `pwd` is inside the .git directory

git rev-parse --is-inside-git-dir

# path to the .git directory (may be relative or absolute)

git rev-parse --git-dir

#git list remotes
git remote -v

#git remove origin
git remote rm origin

#git commit
#git commit -av #show the diff and commit files
#git commit #just allows you to commit in vim
#git commit -a #with staged files, but no new files
#git commit -m "command line message"

# inverses of each other:

# `pwd` relative to root of repository

git rev-parse --show-prefix

# root of repository relative to `pwd`

git rev-parse --show-cdup

#delete tag

# delete local tag '12345'

git tag -d 12345

# delete remote tag '12345' (eg, GitHub version too)

git push origin :refs/tags/12345

# alternative approach

git push --delete origin tagName
git tag -d tagName

#push tag to remote
git push origin v0.2.3

#git which tag am I on?

# git describe --tags

-or-

# git describe --exact-match --tags $(git log -n1 --pretty='%h')

-or-

# git describe --tags --abbrev=0

-or-

# git name-rev --tags --name-only $(git rev-parse HEAD)

# Create a new branch from tag v1.1

git checkout -b newbranch v1.1

# Do some work and commit it

# Create a new tag from your work

git tag -a -m "Tag version 1.1.1, a bugfix release" v1.1.1

# push tag

git push origin [v1.1.1]

#force a push
git push --force origin master

#https://stackoverflow.com/questions/1274057/how-to-make-git-forget-about-a-file-that-was-tracked-but-is-now-in-gitignore
#update files in repo according to gitignore
git rm -r --cached .
git add .
git commit -am "Remove ignored files"
git push origin [branch]

#https://stackoverflow.com/questions/1274057/how-to-make-git-forget-about-a-file-that-was-tracked-but-is-now-in-gitignore
#remove those untracked files. One-line, Unix-style, clean output:
git ls-files --ignored --exclude-standard | sed 's/.\*/"&"/' | xargs git rm -r --cached

# You can omit origin and -u new-feature parameters from the git push command with the following two Git configuration changes:

$ git config remote.pushdefault origin
$ git config push.default current
