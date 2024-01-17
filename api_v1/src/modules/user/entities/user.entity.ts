import { Role } from 'src/modules/role/entities/role.entity';
import {
  Column,
  Entity,
  JoinColumn,
  OneToOne,
  PrimaryGeneratedColumn,
} from 'typeorm';

@Entity()
export class User {
  @PrimaryGeneratedColumn('uuid')
  id: string;

  @Column()
  fullname: string;

  @Column({ unique: true })
  email: string;

  @Column()
  password: string;

  @Column()
  image: string;

  @Column({ default: false })
  status: boolean;

  @Column({ type: 'datetime', default: 'now()' })
  createdAt: Date;

  @Column()
  updatedAt: Date;

  @OneToOne(() => Role)
  @JoinColumn()
  roleId: Role;
}
