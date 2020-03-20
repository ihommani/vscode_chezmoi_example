# [Chezmoi](https://www.chezmoi.io/) with VSCode remote-containers extension

This is a sample project that lets you try out the **[VS Code Remote - Containers](https://aka.ms/vscode-remote/containers)** extension installed with Chezmoi tool in a few easy steps.   

Chezmoi, is dotfile manager inspired by Puppet.   
If unknown to you, the first place to check is the [official documentation](https://github.com/twpayne/chezmoi).   
Then create your own dotfile repository compatible with Chezmoi (this [one](https://github.com/ihommani/chezmoi_dotfiles) can be used for demo purpose). 

## Setting up the development container

Follow these steps to open this sample in a container:

1. If this is your first time using a development container, please follow the [getting started steps](https://aka.ms/vscode-remote/containers/getting-started).

2. To use this repository, you need to open a locally cloned copy of the code:

   - Clone this repository to your local filesystem.
   - [Configure](https://code.visualstudio.com/docs/remote/containers#_personalizing-with-dotfile-repositories) your dotfile repository in VSCode. It will serve as a Chezmoi source of truth. Use `~/.local/share/chezmoi` as the target path. 
   - Configure adapt `.devcontainer/chezmoi.toml` content. (key should match placeholder in your managed dotfiles)
   - Press <kbd>F1</kbd> and select the **Remote-Containers: Open Folder in Container...** command.
   - Select the cloned copy of this folder, wait for the container to start, and try things out!

## Things to try

Once you have this sample opened in a container, you'll be able to work with it like you would locally.   
In particular, check that dotfiles in your home directory should match the target state adapted to your environment.   

> **Note:** This container runs as a root user by default. Add `"remoteUser": "vscode"` in `.devcontainer/devcontainer.json` if you'd prefer to run as vsCode user.

Some things to try:

1. **Play with Chezmoi:**
   - Open a terminal
   - Type `chezmoi`
2. **Change your source of truth:**
   - `chezmoi edit [dotfile_of_your_choice]` if already managed. `chezmoi add [new_dotfile]`
   - `chezmoi cd`
   - `git commit -m 'Add change to foo dotfile'` && `git push`
3. **Change the dotfile content according chezmoi.toml values:**
   - Open a templated dotfile (`chezmoi add -T --autotemplate [new_dotfile]`) or transform an existing one into a template: `chezmoi chattr template ~/managed_dotfile`
   - Add [conditional](https://pkg.go.dev/text/template?tab=doc) [placeholders](http://masterminds.github.io/sprig/) on values present in the `.devcontainer/chezmoi.toml`.       
    (add new values in the data section and reference it as `.key_name` in the template)
   - Press <kbd>F1</kbd> and select the **Remote-Containers: Reopen in Container...** command.. 
   - See templates outputs being consistent with your chezmoi configuration file values.
