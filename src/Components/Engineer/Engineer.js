import React from 'react';
import './engineer.css';
import { ImUserCheck } from "react-icons/im";

const Engineer = (props) => {
    // destructuring accepted data 
    const {name, position, avater, email, projects, jobExperience, bidAmount}= props.engineer;

    return (
        <div className='engineer-container'>

            {/* candidate's picture  */}
            <div>
                <img className='profile-img' src={avater} alt="" />
            </div>
            <div className='info'>

                {/* background profile of candidate  */}
                <div>
                    <p className="profile-name"><strong>{name}</strong></p>
                    <p>Position: {position}</p>
                    <p>Email: <i>{email}</i></p>
                    <p>Completed projects: {projects}</p>
                    <p>Job experience: {jobExperience} years</p>
                </div>

                {/* Bid for the post and select  */}
                <div>
                    <div className='select-amount'>
                        <p className='bid'>Bid Amount: <br /><span className='amount'>${bidAmount}</span></p>
                        <button className='btn-regular' onClick={()=>props.handleSelect(props.engineer)}><ImUserCheck className='select-icon' /> Select</button>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Engineer;