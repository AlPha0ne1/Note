အရင်ဆုံး နာမည်လေး clarify လုပ်မယ် — Z.AI ရဲ့ “Flash free” model က DeepSeek မဟုတ်ပါဘူး။ Official နာမည်က GLM-4.7-Flash ဖြစ်ပါတယ်။ GLM-4.7 docs မှာ Flash ကို “Lightweight, Completely Free”, 200K context, 128K max output tokens လို့ ဖော်ပြထားပါတယ်။ Older one က GLM-4.5-Flash ဖြစ်ပြီး “Free / coding & agents” အတွက်လည်း ဖော်ပြထားပါတယ်။

1) OpenCode install လုပ်မယ်
Kali / Ubuntu / Debian
sudo apt update
sudo apt install -y curl git ca-certificates

curl -fsSL https://opencode.ai/install | bash

ပြီးရင် terminal restart လုပ်ပါ၊ မရရင် PATH ထည့်ပါ။

echo 'export PATH="$HOME/.opencode/bin:$HOME/.local/bin:$PATH"' >> ~/.bashrc
source ~/.bashrc

opencode --version

OpenCode official docs မှာ terminal install အတွက် curl -fsSL https://opencode.ai/install | bash ကို easiest method အဖြစ်ပြထားပြီး npm, bun, pnpm, yarn, brew နဲ့လည်း install လုပ်လို့ရပါတယ်။

Mac
brew install anomalyco/tap/opencode
opencode --version

Docs မှာ Homebrew အတွက် brew install anomalyco/tap/opencode ကို up-to-date release အတွက် recommend လုပ်ထားပါတယ်။

2) Z.AI API key ယူမယ်

Z.AI account login/register လုပ်ပြီး API Keys ထဲကနေ key create လုပ်ပါ။ Z.AI quick start docs မှာ API key create → model choose → API call ဆိုပြီး flow ပြထားပါတယ်။

ပြီးရင် terminal မှာ key ကို environment variable ထားပါ။

echo 'export ZAI_API_KEY="PASTE_YOUR_ZAI_API_KEY_HERE"' >> ~/.bashrc
source ~/.bashrc

Mac ဆိုရင် zsh ဖြစ်နိုင်လို့—

echo 'export ZAI_API_KEY="PASTE_YOUR_ZAI_API_KEY_HERE"' >> ~/.zshrc
source ~/.zshrc

Test လုပ်မယ်—

curl -X POST "https://api.z.ai/api/paas/v4/chat/completions" \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer $ZAI_API_KEY" \
  -d '{
    "model": "glm-4.7-flash",
    "messages": [
      {"role": "user", "content": "Say hello in one sentence."}
    ],
    "max_tokens": 200
  }'

Z.AI docs မှာ general API endpoint က https://api.z.ai/api/paas/v4/chat/completions ဖြစ်ပြီး OpenAI-compatible style နဲ့ call လုပ်နိုင်ပါတယ်။

3) OpenCode ထဲမှာ Z.AI connect လုပ်မယ်

Project folder ထဲဝင်ပါ။

mkdir -p ~/Projects/opencode-test
cd ~/Projects/opencode-test
opencode

OpenCode TUI ထဲရောက်ရင်—

/connect

ပြီးရင် Z.AI ကိုရှာပြီး select လုပ်ပါ။ API key ထည့်ပါ။ ပြီးရင်—

/models

glm-4.7-flash သို့မဟုတ် GLM-4.7-Flash ကိုရွေးပါ။

OpenCode official provider docs မှာ Z.AI ကို built-in provider အဖြစ်ပါပြီး /connect → Z.AI → API key → /models နဲ့ GLM model ရွေးရမယ်လို့ ဖော်ပြထားပါတယ်။

4) Default model အဖြစ် set လုပ်ချင်ရင်

Global config file ဖန်တီးပါ။

mkdir -p ~/.config/opencode
nano ~/.config/opencode/opencode.json

ဒီလိုထည့်ပါ—

{
  "$schema": "https://opencode.ai/config.json",
  "model": "zai/glm-4.7-flash"
}

ပြီးရင်—

opencode

OpenCode docs အရ global config path က ~/.config/opencode/opencode.json ဖြစ်ပြီး model format က provider_id/model_id ဖြစ်ပါတယ်။

5) Z.AI model မပေါ်လာရင် custom provider နဲ့ထည့်မယ်

တချို့ version တွေမှာ model list ထဲ glm-4.7-flash မပေါ်ရင် ဒီ config သုံးပါ။

mkdir -p ~/.config/opencode
nano ~/.config/opencode/opencode.json
{
  "$schema": "https://opencode.ai/config.json",
  "model": "zai-custom/glm-4.7-flash",
  "provider": {
    "zai-custom": {
      "npm": "@ai-sdk/openai-compatible",
      "name": "Z.AI Custom",
      "options": {
        "baseURL": "https://api.z.ai/api/paas/v4",
        "apiKey": "{env:ZAI_API_KEY}"
      },
      "models": {
        "glm-4.7-flash": {
          "name": "GLM-4.7 Flash",
          "limit": {
            "context": 200000,
            "output": 128000
          }
        },
        "glm-4.5-flash": {
          "name": "GLM-4.5 Flash",
          "limit": {
            "context": 128000,
            "output": 96000
          }
        }
      }
    }
  }
}

OpenCode custom provider docs မှာ OpenAI-compatible provider အတွက် @ai-sdk/openai-compatible, options.baseURL, models, apiKey env syntax, context/output limit fields တွေ သုံးလို့ရတယ်လို့ ဖော်ပြထားပါတယ်။

6) Start သုံးမယ်
cd ~/Projects/opencode-test
opencode

TUI ထဲမှာ အစမှာ ဒီလို command ရိုက်ပါ—

/init

ပြီးရင် project ကိုမပြင်ခင် plan အရင်ရေးခိုင်းချင်ရင်—

Analyze this project first. Do not edit files yet. Give me the plan only.

Code ပြင်ခိုင်းချင်ရင်—

Fix the error in this project. Explain the files you will change first, then make the changes.
Error ဖြစ်ရင် အဓိကစစ်ရန်

1. API key loaded မဖြစ်တာ

echo $ZAI_API_KEY

ဘာမှမထွက်ရင် .bashrc / .zshrc ပြန် source လုပ်ပါ။

2. OpenCode auth check

opencode auth list

OpenCode troubleshooting docs မှာ provider issue ဖြစ်ရင် opencode auth list နဲ့ credential ရှိမရှိစစ်ရန်၊ custom provider ID တူမတူစစ်ရန်၊ baseURL မှန်မမှန်စစ်ရန် ပြောထားပါတယ်။

3. Kali မှာ OpenTUI library error ဖြစ်ရင်

rm -rf ~/.cache/opencode ~/.local/share/opencode
curl -fsSL https://opencode.ai/install | bash
source ~/.bashrc
opencode --version

မရသေးရင် npm version နဲ့ install လုပ်ပါ—

sudo apt install -y nodejs npm
sudo npm install -g opencode-ai
opencode --version
သင့်အတွက် recommended setup

Kali/Mac မှာ easiest setup က ဒီ flow ပါ—

curl -fsSL https://opencode.ai/install | bash
export ZAI_API_KEY="your_key"
opencode

ပြီးရင် OpenCode ထဲမှာ—

/connect

Z.AI ရွေး → API key paste →

/models

glm-4.7-flash ရွေးပါ။ This is the current “Flash free” option you’re looking for.
Z.ai - Advanced AI Chatbot & Agent powered by GLM-5.2
