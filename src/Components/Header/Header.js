import React from 'react';
import './header.css';
import Banner from '../../images/banner.png';
import Banner2 from '../../images/banner-2.png';

const Header = () => {

    return (
        <div className='header-container'>
                <img className='banner banner-1' src={Banner} alt="" />
            <div>
                <h1>Asian Satelite 2</h1>
                <h2 className='project-budget'>Total Budget $800 million</h2>
            </div>
            
                <img className='banner' src={Banner2} alt="" />
    
        </div>
    );
};

export default Header;