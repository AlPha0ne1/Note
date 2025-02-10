# Connecting the github repo with SSH

1. ssh-keygen -t ed25519 -C "your_email@example.com"
2. cat ./.ssh/id_ed25519.pub
3. Go the github setting
4. set the new SSH key in SSH key section

# Using Github CLI with SSH 
```
#cp -r ../Downloads/project/ex* .
#git status
#git add * (track all the copy files)
#git status
#git commit -m "random_test" (to remember)
#git push (all uploaded to git repo)
```
## To upload the empty folder

```
#touch empty_folder/.gitrepo
#git add empty_folder/.gitrepo
#git commit -m "keeping empty folder"
#git push origin main
```
