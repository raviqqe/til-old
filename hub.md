# hub

## Sending a pull request

1. Fork the repository with your account on [GitHub](https://github.com).
2. Clone the forked repository.

  ```
  $ git clone https://github.com/$your_name/$the_repo.git
  ```

3. Make a new (feature) branch.

  ```
  $ cd $the_repo
  $ git checkout -b $branch_name
  ```

4. Edit some files and commit changes.
5. Repeat #4 some times.
6. Push the commits.

  ```
  $ git push -u origin $branch_name
  ```

7. Add the upstream repository.

  ```
  $ git remote add https://github.com/$someone/$the_repo.git
  ```

8. Pull upstream's master branch

  ```
  $ git checkout master
  $ git pull upstream master # any conflicts should not occur
  $ git push origin master
  ```

9. Rebase your feature branch
  See also `-i` option of `git rebase` for interactive rebasing.

  ```
  $ git checkout $branch_name
  $ git rebase master # rebase your branch to upsteam's master
  ```

10. Push changes related to rebasing

  ```
  $ git push -f
  ```

11. Make a pull request on your browser


## Forking by `hub fork` command

```
$ git clone https://github.com/$someone/$repo
$ cd $repo
$ hub fork # enter your username and password on GitHub
```
