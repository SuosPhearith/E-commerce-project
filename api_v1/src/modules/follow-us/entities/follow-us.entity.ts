import { User } from 'src/modules/user/entities/user.entity';
import {
  Column,
  Entity,
  JoinColumn,
  OneToOne,
  PrimaryGeneratedColumn,
} from 'typeorm';

@Entity()
export class FollowUs {
  @PrimaryGeneratedColumn('uuid')
  id: string;

  @Column()
  title: string;

  @Column()
  description: Text;

  @Column()
  url: string;

  @Column()
  updatedAt: Date;

  @OneToOne(() => User)
  @JoinColumn()
  updatedBy: User;
}
