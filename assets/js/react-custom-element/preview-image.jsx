import React, {Component, useState} from "react";

export class PreviewImage extends Component{
    constructor() {
        super();
        this.state =  {
            count:0
        }
        this.autoIncrement = this.autoIncrement.bind(this);
    }

    autoIncrement()
    {
        this.interval = setInterval(()=>{
            this.setState({count:this.state.count + 1})
        },1000)
    }
    componentDidMount() {
        this.autoIncrement()
    }
    componentWillUnmount() {
        clearInterval(this.interval)
    }

    render() {
        return <div>
            Cool not or not cool {this.state.count}
        </div>
    }
}

const App = () => {

}
