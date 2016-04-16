#!/bin/bash
COMMMENT=${1:-no-comment-given}
branch_name=$(git symbolic-ref -q HEAD)
branch_name=${branch_name##refs/heads/}
branch_name=${branch_name:-HEADi}

git status;
git add -A;
git commit -m "$COMMMENT";
git push origin $branch_name;
git status;