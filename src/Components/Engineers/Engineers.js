import React, { useEffect, useState } from 'react';
import Cart from '../Cart/Cart';
import Engineer from '../Engineer/Engineer';
import './engineers.css';

const Engineers = () => {
    // declear state to keep fetched data and selected candidates 
    const [engineers,setEngineers] = useState([]);
    const [selects,setSelect] = useState([])

    // load data from json file 
    useEffect(()=>{
        fetch('/engineers.json')
            .then(res=>res.json())
            .then(data=>setEngineers(data.satEngineers))
    },[]);

    // keep the selected candidates 
    const handleSelect = (props) =>{
        if(!selects.includes(props)){
            const newSelect = [...selects,props];
            setSelect(newSelect);
        }
    }
    return (
        <div className='project-container'>
            <div className="engineers-container">
                {/* show each applicant on display  */}
                {
                    engineers.map(engineer => <Engineer key={engineer.id} engineer={engineer} handleSelect={handleSelect}></Engineer>)
                }
            </div>

            {/* presentation board of selected candidates  */}
            <div>
                <Cart selects={selects}></Cart>
            </div>
        </div>
    );
};

export default Engineers;