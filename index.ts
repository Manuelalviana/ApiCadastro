import express from 'express'
import { AppDataSource } from './DataSource'
import { CadastroAluno } from '../model/cadastroaluno';
import { CadastroAula } from '../Model/CadastroAula';

AppDataSource.initialize().then(()=>{
     const app = express()

     app.use(express.json())

     app.get('/', (req, res)=>{
        return res.json('Tudo certo')   
     })
     return app.listen(process.env.PORT)
})
