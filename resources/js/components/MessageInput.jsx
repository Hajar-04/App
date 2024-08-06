import React, { useState } from "react";
import axios from "axios";

const MessageInput = ({ rootUrl, onMessageSent }) => {
    const [message, setMessage] = useState("");

    const messageRequest = async (text) => {
        try {
            await axios.post(`${rootUrl}/message`, { text });
            // Appeler la fonction de rappel pour mettre à jour les messages
            onMessageSent();
        } catch (err) {
            console.log(err.message);
        }
    };

    const sendMessage = (e) => {
        e.preventDefault();
        if (message.trim() === "") {
            alert("Please enter a message!");
            return;
        }

        messageRequest(message);
        setMessage("");
    };

    return (
        <div className="input-group">
            <input
                onChange={(e) => setMessage(e.target.value)}
                autoComplete="off"
                type="text"
                className="form-control"
                placeholder="Message..."
                value={message}
            />
            <div className="input-group-append">
                <button
                    onClick={(e) => sendMessage(e)}
                    className="btn btn-primary"
                    type="button"
                >
                    Send
                </button>
            </div>
        </div>
    );
};

export default MessageInput;
