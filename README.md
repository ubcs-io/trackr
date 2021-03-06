# Trackr

This is a small application that can be used to log daily events and behaviors.  Included in this repository are the necessary scripts to download and develop locally, along with provisioning files for a mock database.

![Trackr Dashboard](html/view/media/Trackr.png)

## Trackr Use Cases

Use this to track when you're working out, spending some time practicing a skill, or just need to track a regular event.  Use the dashboard to see how you're keeping up on those tasks, and whether there's any daily events that you haven't gotten to yet.  Use it to track health events (allergies, affect, and medication), behaviors (meditation, working out, practicing a skill), or chores (ending the day without dishes, etc).

# How to Use this Repository

This project allows you to clone the repo and start up a local development environment.  This will give you the ability to edit and run server-side code (PHP) on your preferred computer.  From there, you can look at common issues, fork a copy, and make pull requests.

### Getting Started

This repository contains the setup files in the DEV directory.  In this folder you'll find an additional README that provides details on how to set up this on your own machine.  Thanks to John H from **The Research Group** [on Github](https://github.com/The-Research-Group "The Research Group") for writing and sharing that code.  The code for the application itself can be found under the html folder.

Please note that the DEV environment code is distributed under a different license.  If you would like to re-use the code from that project, get in touch with them first.

#### How Does it Work?

When you activate the development environment using script/start, you are starting up a virtual machine locally, which can then be accessed through a brower.  This allows you to make changes to the files on your machine, and then view the changes live through a browser.  This happens by changing the hosts file on your local machine, so that when you visit trackr-dev.com, it points your browser to the virtual machine instead of an external server.

## Setup Steps

Start by downloading VirtualBox (version 5.1 or earlier) and Vagrant, [descriptions and links](https://github.com/ubcs-io/trackr/tree/master/DEV) in the DEV folder of this repository.  If you've finished that and you're working on a Mac, the next step is to open a Terminal window.  
2. Then navigate to that directory by using `cd ~/documents/projects`  
3. Fetch the project from the githubt with `git clone https://github.com/ubcs-io/trackr.git`
4. Change directories with `cd ~/documents/projects/trackr/DEV` 
5. Start up the virtual machine by running `script/start` This startup may take a minute. 
6. Look for a "Startup Complete" message and visit the server at [trackr-dev.com](http://www.trackr-dev.com/).

As you make changes in the files on your local machine, you'll see the changes reflected in the site that's served up in your browser.

### Contributing

If you see a change you'd like to make, go ahead and fork a copy of this repository and make a pull request.  If you're looking for ideas, check through the 'issues' section of the repo to see if there are any that you think you'd like to try your hand at.  If you're interested in an issue but would like help understanding the codebase, feel free to leave a comment on the issue.

To make changes, go ahead and fork this repository, push your changes to a new branch on that repository, and then make a pull request.

### Troubleshooting

1. **When running script/start, I get an error that Virtualbox 5.2 is not supported:**  When installing VB, use 5.1.  5.2 isn't currently tested / supported for the virtual environment.

2. **My browser show an error that reads 'ERR_NAME_NOT_RESOLVED':**  Make sure you've already started the virtual machine and waited for it to finish loading.

3. **My browser show an error that reads 'ERR_CONNECTION_REFUSED' AFTER running script/start:**  Verify your hosts file is not read only by using `sudo chmod 666 /etc/hosts`, flushing the DNS cache, restarting the VM and then booting it up again.

4. **I placed the repository in a different directory:**  If you used a directory other than `/Users/$USER/documents/projects` then you'll need to update the `vm_config.sh` file.  Once you're there, update the `host_folders[0]` to point to the correct directory (wherever you placed the repository)

5. **What password do I use for script/start:**  If you're prompted for a password when running script/start or script/shutdown, use the password for your local machine.  The command line is prompting you for your password because the setup script is using sudo to make changes to files on your machine.

