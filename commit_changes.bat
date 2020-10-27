@echo off
set /p commit="Commit: "
git commit -a -m %commit%
git push origin master
