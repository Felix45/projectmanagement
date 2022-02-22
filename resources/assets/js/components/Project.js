import React, { Component, useReducer } from 'react';
import ReactDOM from 'react-dom';

class Card extends Component{
   render(){

    const url = "/project/".concat(this.props.project.id);
    const profile = "/profile/".concat(this.props.project.user_id);

    return (<div className="mb-4 mr-3 project p-4">
            <h6>
                <strong><a href={url}>{ this.props.project.title }</a></strong>
            </h6>
            <hr/>
            <div>Tasks: <span className="badge badge-success p-1">{this.props.project.task_count}</span></div>
            <div className="pull-left align-items-baseline pt-1">
                Project Owner <a href={profile} className="pr-2 pl-1">{ this.props.project.user_name }</a>
               {this.props.project.edit ? <a href={url} className="btn btn-sm btn-primary font-weight-bold">Add Task(s)</a> : '' }
            </div>                  
        </div>);
    }
}

export default class Project extends Component {
    render() {
        let count = 1;
        return (
            <div>
                {this.props.projects.map(project => <Card key={count++} project = {project} />)}
            </div>     
        );
    }
}

if (document.getElementById('rproject')) {
    const projects = document.querySelector("#rproject").getAttribute("data-projects");
    ReactDOM.render(<Project projects={JSON.parse(projects)} />, document.getElementById('rproject'));
}
