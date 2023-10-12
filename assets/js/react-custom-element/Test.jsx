import React, {useEffect, useState} from "react";

export function Test ({name})
{
    const [count,setCount] = useState(1)
    const [message,setMessage] = useState('')
    const increment = () => {
        setCount(count + 1)
    }
    return (
        <div className="flex flex-row items-center">
            {message}
            {name}
            <button onClick={increment}>Incrementer</button>
            <input type="text" name="message" value={message} onChange={(e)=>setMessage(e.target.value)} />
            <div>Deded {count}</div>
        </div>
    )
}