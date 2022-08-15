import { DataSource } from "typeorm"
import 'detenv/config'
import 'reflect-metadata'

export const AppDataSource = new DataSource({
    type: 'mysql',
    host: process.env.DB_PORT,
    port: 3306,
    username: process.env.DB_USER,
    password: process.env.DB_PASS,
    database: process.env.DB_NAME,
    synchronize: true,
    logging: true,
    subscribers: [],
    migrations: [],
})

AppDataSource.initialize()
    .then(() => {
        console.log("A fonte de dados foi inicializada!")
    })
    .catch((err) => {
        console.error("Erro durante a inicialização da fonte de dados", err)
    })