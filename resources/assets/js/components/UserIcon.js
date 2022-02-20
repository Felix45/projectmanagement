import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class UserIcon extends Component {
    render() {
        return (
            <div className="text-center user-icon">
                <span className="fa-stack fa-3x">
                    <i className="fa fa-circle fa-stack-2x"></i> 
                    <i className="fa fa-user-o fa-stack-1x fa-inverse"></i> 
                </span>	
            </div>
        );
    }
}

if (document.getElementById('usericon')) {
    ReactDOM.render(<UserIcon />, document.getElementById('usericon'));
}
