import React from 'react';
import SelectedEngineer from '../SelectedEngineer/SelectedEngineer';
import './cart.css'

const Cart = (props) => {
    const {selects} = props;
    // sumup the total amount for selected candidates 
    const bidReducer = (previous,current) => previous + current.bidAmount;
    const totalAmount = selects.reduce(bidReducer,0)
    return (
        <div className='cart-info'>
            <h3><u>Selected Candidates</u></h3>
            <p>Total select: <strong>{selects.length}</strong></p>
            <p>Total Bid Amount: <strong>${totalAmount}</strong></p> 

            {/* Represent the selected candidates  */}
            <div className="token-container">
                {
                    selects.map(select => <SelectedEngineer key={select.id} select={select}></SelectedEngineer>)
                }
            </div>
        </div>
    );
};

export default Cart;