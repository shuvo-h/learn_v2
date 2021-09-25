import React from 'react';
import './selectedEngineer.css';

const SelectedEngineer = (props) => {
    const {avater, name} = props.select;
    console.log(props.select);
    return (
        <div className='card-token'>
            <img className="token-img" src={avater} alt="" />
            <p className="token-name">{name}</p>
        </div>
    );
};

export default SelectedEngineer;