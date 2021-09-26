import React from 'react';
import SelectedEngineer from '../SelectedEngineer/SelectedEngineer';
import './cart.css'

const Cart = (props) => {
    const {selects} = props;
    let totalAmount = 0;
    for(const select of selects){
        totalAmount = totalAmount + select.bidAmount;
    }
    return (
        <div className='cart-info'>
            <h3><u>Selected Candidates</u></h3>
            <p>Total select: <strong>{selects.length}</strong></p>
            <p>Total Bid Amount: <strong>${totalAmount}</strong></p> 
            <div className="token-container">
                {
                    selects.map(select => <SelectedEngineer key={select.id} select={select}></SelectedEngineer>)
                }
            </div>
        </div>
    );
};

export default Cart;