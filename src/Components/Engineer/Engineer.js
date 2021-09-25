import React from 'react';
import './engineer.css';
import { ImUserCheck } from "react-icons/im";

const Engineer = (props) => {
    const {name, position, avater, email, expectedSalary, jobExperience, bidAmount}= props.engineer;
    // console.log(props);
    return (
        <div className='engineer-container'>
            <div>
                <img className='profile-img' src={avater} alt="" />
            </div>
            <div className='info'>
                <div>
                    <p><strong>{name}</strong></p>
                    <p>Position: {position}</p>
                    <p>Email: {email}</p>
                    <p>Salary: ${expectedSalary}</p>
                    <p>Experience: {jobExperience} years</p>

                </div>
                <div className='select-amount-container'>
                    <div className='select-amount'>
                        <p className='bid'>Bid Amount: ${bidAmount}</p>
                        <button onClick={()=>props.handleSelect(props.engineer)}><ImUserCheck className='select-icon' /> Select</button>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Engineer;