import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Profile extends Component {
    render() {
        return (
          <div>
            <div className="d-flex mb-2 align-items-center">
               <div className="pr-5">
                   <span class="badge badge-primary p-1 mr-1">{ this.props.data.projects }</span>Project(s)
               </div>
               <div className="pr-5">
                   <span className="badge badge-success p-1 mr-1">{ this.props.data.assigned }</span>Assigned task(s)
               </div>
               <div className="pr-5">
                   <span className="badge badge-danger p-1 mr-1">{ this.props.data.pending }</span>Pending task(s)
               </div>
           </div>
           <div>
               <div>
                   <strong>Responsibility</strong>
                </div>
               <div>
                   { this.props.data.responsibility }
                </div>
               <div className="pt-3 pb-3 text-justify">{this.props.data.description}</div>
               <div className="pt-3 pb-1 mb-0 text-justify">
                   <blockquote className="blockquote mb-0">{this.props.data.quote}</blockquote>
                </div>
           </div>
         </div>
        );
    }
}

if (document.getElementById('rprofile')) {
    const data = document.getElementById("rprofile").getAttribute("data-profile");

    ReactDOM.render(<Profile data={JSON.parse(data)} />, document.getElementById('rprofile'));
}
