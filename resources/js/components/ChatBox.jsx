import React, { useEffect, useRef, useState } from "react";
import axios from "axios";
import Message from "./Message";
import MessageInput from "./MessageInput";

const ChatBox = ({ rootUrl }) => {
    const userData = document.getElementById('main')
        .getAttribute('data-user');
    const user = JSON.parse(userData);
    const webSocketChannel = `channel_for_everyone`;

    const [messages, setMessages] = useState([]);
    const scroll = useRef();

    const scrollToBottom = () => {
        scroll.current.scrollIntoView({ behavior: "smooth" });
    };

    const connectWebSocket = () => {
        window.Echo.private(webSocketChannel)
            .listen('GotMessage', async (e) => {
                await getMessages();
                scrollToBottom();
            });
    };

    const getMessages = async () => {
        try {
            const response = await axios.get(`${rootUrl}/messages`);
            setMessages(response.data);
            scrollToBottom();
        } catch (err) {
            console.log(err.message);
        }
    };

    useEffect(() => {
        getMessages();
        connectWebSocket();

        return () => {
            window.Echo.leave(webSocketChannel);
        };
    }, []);

    const handleSendMessage = () => {
        // Mise à jour des messages après l'envoi réussi
        getMessages();
    };

    return (
        <div className="row justify-content-center">
            <div className="col-md-8">
                <div className="card">
                    <div className="card-header">Chat Box</div>
                    <div
                        className="card-body"
                        style={{ height: "500px", overflowY: "auto" }}
                    >
                        {messages?.map((message) => (
                            <Message
                                key={message.id}
                                userId={user.id}
                                message={message}
                            />
                        ))}
                        <span ref={scroll}></span>
                    </div>
                    <div className="card-footer">
                        <MessageInput
                            rootUrl={rootUrl}
                            onMessageSent={handleSendMessage}
                        />
                    </div>
                </div>
            </div>
        </div>
    );
};

export default ChatBox;
