// resources/js/components/ChatBox.js
import React, { useState, useEffect } from 'react';

function Chatapp({ userId }) {
    const [messages, setMessages] = useState([]);

    useEffect(() => {
        if (userId) {
            fetch(`/messages?userId=${userId}`)
                .then(response => response.json())
                .then(data => setMessages(data))
                .catch(error => console.error('Error fetching messages:', error));
        }
    }, [userId]);

    return (
        <div className="chat-box">
            {messages.map((message, index) => (
                <div key={index} className="message">
                    <p>{message.text}</p>
                </div>
            ))}
        </div>
    );
}

export default Chatapp;
