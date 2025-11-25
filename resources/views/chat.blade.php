<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>EduHelperAgent Chat</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            padding: 0;
            margin: 0;
        }
        .chat-container {
            width: 450px;
            margin: 40px auto;
            background: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .chat-box {
            height: 380px;
            overflow-y: auto;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            background: #fafafa;
        }
        .message { margin-bottom: 15px; }
        .user { text-align: right; color: #1a73e8; }
        .bot { text-align: left; color: #222; }
        input {
            width: 75%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-top: 15px;
        }
        button {
            padding: 10px 14px;
            background: #1a73e8;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover { background: #0b5bd8; }
    </style>
</head>

<body>
    <div class="chat-container">
        <h2>EduHelperAgent</h2>

        <div class="chat-box" id="chatBox"></div>

        <input type="text" id="userMessage" placeholder="Ask something...">
        <button onclick="sendMessage()">Send</button>
    </div>

    <script>
        function sendMessage() {
            let message = document.getElementById('userMessage').value;
            if(message.trim() === "") return;

            let chatBox = document.getElementById('chatBox');

            chatBox.innerHTML += `<div class="message user"><strong>You:</strong> ${message}</div>`;
            chatBox.scrollTop = chatBox.scrollHeight;

            document.getElementById('userMessage').value = "";

            fetch("{{ url('/chat') }}", {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify({ message: message })
})

            .then(res => res.json())
            .then(data => {
                chatBox.innerHTML += `<div class="message bot"><strong>Bot:</strong> ${data.reply}</div>`;
                chatBox.scrollTop = chatBox.scrollHeight;
            })
            .catch(err => {
                chatBox.innerHTML += `<div class="message bot"><strong>Bot:</strong> Error! Try again.</div>`;
            });
        }
    </script>
