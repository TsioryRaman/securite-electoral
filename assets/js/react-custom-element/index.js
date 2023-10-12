import r2wc from "@r2wc/react-to-web-component"
import { Test } from "./Test.jsx";

const Preview = r2wc(Test,{props:{
    name:"string"
}})

customElements.define("preview-image", Preview)