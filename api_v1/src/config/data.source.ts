import { DataSource, DataSourceOptions } from 'typeorm';

export const dbdatasource: DataSourceOptions = {
  // TypeORM PostgreSQL DB Drivers
  type: 'postgres',
  host: 'localhost',
  port: 5432,
  username: 'postgres',
  password: '123',
  // Database name
  database: 'ecommerce',
  // Synchronize database schema with entities
  synchronize: false,
  // TypeORM Entity
  entities: ['dist/**/*.entity{.ts,.js}'],
  // Your Migration path
  migrations: ['dist/src/migrations/*.js'],
  migrationsTableName: 'migrations',
};

const dataSource = new DataSource(dbdatasource);
export default dataSource;
