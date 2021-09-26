import React from 'react';
import './selectedEngineer.css';
import { IoCheckmarkDoneSharp } from "react-icons/io5";

const SelectedEngineer = (props) => {
    const {avater, name} = props.select;
    console.log(props.select);
    return (
        <div className='card-token'>
            <img className="token-img" src={avater} alt="" />
            <p className="token-name"><IoCheckmarkDoneSharp className="token-icon"/> {name}</p>
        </div>
    );
};

export default SelectedEngineer;