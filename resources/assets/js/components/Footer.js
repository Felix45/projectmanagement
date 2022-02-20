import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Footer extends Component {
    render() {
        return (
            <div className="container">
                <div className="row">
                        <div className="col-md-12">
                                copyright &copy; {this.props.appname} {this.props.copy}
                        </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('footer')) {
    let app = document.getElementById('footer').getAttribute('data-appname');
    let year = document.getElementById('footer').getAttribute('data-date');
    ReactDOM.render(<Footer appname={app} copy={year} />, document.getElementById('footer'));
}
