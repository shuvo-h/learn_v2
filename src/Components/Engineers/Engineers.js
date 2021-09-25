import React, { useEffect, useState } from 'react';
import Cart from '../Cart/Cart';
import Engineer from '../Engineer/Engineer';
import './engineers.css';

const Engineers = () => {
    const [engineers,setEngineers] = useState([]);
    const [selects,setSelect] = useState([])
    useEffect(()=>{
        fetch('/engineers.json')
            .then(res=>res.json())
            .then(data=>setEngineers(data))
    },[]);
    const handleSelect = (props) =>{
        if(!selects.includes(props)){
            const newSelect = [...selects,props];
            setSelect(newSelect);
        }
    }
    return (
        <div className='project-container'>
            <div className="engineers-container">
                {
                    engineers.map(engineer => <Engineer key={engineer.id} engineer={engineer} handleSelect={handleSelect}></Engineer>)
                }
            </div>
            <div>
                <Cart selects={selects}></Cart>
            </div>
        </div>
    );
};

export default Engineers;