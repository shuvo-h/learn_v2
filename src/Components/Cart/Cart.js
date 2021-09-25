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
            <p>Selected candidates: {selects.length} </p>
            <p>Total Bid Amount: ${totalAmount}</p> 
            {
                selects.map(select => <SelectedEngineer key={select.id} select={select}></SelectedEngineer>)
            }
        </div>
    );
};

export default Cart;